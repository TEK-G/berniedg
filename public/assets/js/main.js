(() => {
  'use strict';
  const $ = (s, root = document) => root.querySelector(s);
  const $$ = (s, root = document) => [...root.querySelectorAll(s)];
  const data = JSON.parse($('#site-data').textContent);
  const reduce = matchMedia('(prefers-reduced-motion: reduce)');
  const systemTheme = matchMedia('(prefers-color-scheme: dark)');
  const safeStorage = { get(key) { try { return localStorage.getItem(key); } catch { return null; } }, set(key, value) { try { localStorage.setItem(key, value); } catch {} } };
  const escapeHTML = value => String(value).replace(/[&<>"']/g, char => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[char]));
  let toastTimer;
  function toast(message) { const el = $('.toast'); el.textContent = message; el.classList.add('is-visible'); clearTimeout(toastTimer); toastTimer = setTimeout(() => el.classList.remove('is-visible'), 2600); }
  window.careToast = toast;

  // Alternate static portrait styles every seven seconds, starting with pixel.
  const portrait = $('[data-portrait]');
  if (portrait) {
    let portraitTimer;
    const stopPortraitCycle = () => clearInterval(portraitTimer);
    const startPortraitCycle = () => {
      stopPortraitCycle();
      portrait.classList.remove('is-original');
      if (!reduce.matches && !document.hidden) {
        portraitTimer = setInterval(() => portrait.classList.toggle('is-original'), 7000);
      }
    };
    document.addEventListener('visibilitychange', startPortraitCycle);
    reduce.addEventListener('change', startPortraitCycle);
    window.addEventListener('pagehide', stopPortraitCycle);
    window.addEventListener('pageshow', startPortraitCycle);
    startPortraitCycle();
  }

  // The only persisted values are interface preferences, never form or chat data.
  let theme = safeStorage.get('care-theme-green') || 'light';
  function applyTheme() {
    document.documentElement.dataset.theme = theme;
    document.documentElement.classList.toggle('dark', theme === 'dark' || (theme === 'system' && systemTheme.matches));
    $$('button[data-theme]').forEach(button => { const active = button.dataset.theme === theme; button.classList.toggle('is-active', active); button.setAttribute('aria-pressed', active); });
    $('meta[name="theme-color"]').content = document.documentElement.classList.contains('dark') ? '#0e1d16' : '#f1f9f2';
  }
  $$('button[data-theme]').forEach(button => button.addEventListener('click', event => {
    theme = button.dataset.theme; safeStorage.set('care-theme-green', theme);
    if (!reduce.matches && document.startViewTransition) {
      const x = event.clientX || innerWidth, y = event.clientY || innerHeight;
      const radius = Math.hypot(Math.max(x, innerWidth-x), Math.max(y, innerHeight-y));
      const transition = document.startViewTransition(applyTheme);
      transition.ready.then(() => document.documentElement.animate({clipPath:[`circle(0px at ${x}px ${y}px)`,`circle(${radius}px at ${x}px ${y}px)`]}, {duration:540,easing:'cubic-bezier(.32,.08,.24,1)',pseudoElement:'::view-transition-new(root)'})).catch(() => {});
    } else { document.documentElement.classList.add('theme-anim'); applyTheme(); setTimeout(() => document.documentElement.classList.remove('theme-anim'), 520); }
  }));
  systemTheme.addEventListener('change', () => { if(theme === 'system') applyTheme(); }); applyTheme();
  let sound = safeStorage.get('care-sound') === 'on', audioContext;
  function soundUI() { $$('[data-sound]').forEach(button => { button.setAttribute('aria-pressed', sound); button.setAttribute('aria-label', sound ? 'Disable interface sounds' : 'Enable interface sounds'); button.title = sound ? 'Sounds on' : 'Sounds off'; button.innerHTML = sound ? '<svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M3 10v4h4l5 4V6l-5 4H3Zm13-2a6 6 0 0 1 0 8m3-11a10 10 0 0 1 0 14"/></svg>' : '<svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M3 10v4h4l5 4V6l-5 4H3Zm13 0 6 6m0-6-6 6"/></svg>'; }); }
  function playClick() { if(!sound) return; try { audioContext ||= new (window.AudioContext || window.webkitAudioContext)(); if(audioContext.state === 'suspended') audioContext.resume(); const o=audioContext.createOscillator(), g=audioContext.createGain(); o.type='sine'; o.frequency.setValueAtTime(600,audioContext.currentTime);o.frequency.exponentialRampToValueAtTime(420,audioContext.currentTime+.06);g.gain.setValueAtTime(.025,audioContext.currentTime);g.gain.exponentialRampToValueAtTime(.001,audioContext.currentTime+.07);o.connect(g);g.connect(audioContext.destination);o.start();o.stop(audioContext.currentTime+.08); } catch {} }
  $$('[data-sound]').forEach(button => button.addEventListener('click', () => {sound=!sound;safeStorage.set('care-sound',sound?'on':'off');soundUI();}));
  document.addEventListener('click', event => { if(event.target.closest('button,a,summary')) playClick(); }); soundUI();

  const menu = $('#mobile-menu'), menuTrigger = $('[data-menu-open]');
  let menuOpen = false;
  function setMenu(open) { menuOpen=open; menu.inert=!open;menu.classList.toggle('is-open',open);menuTrigger.setAttribute('aria-expanded',open); document.body.classList.toggle('is-locked',open || !!$('dialog[open]')); if(open) $('[data-menu-close]',menu).focus(); else menuTrigger.focus({preventScroll:true}); }
  menuTrigger.addEventListener('click',()=>setMenu(true)); $('[data-menu-close]').addEventListener('click',()=>setMenu(false));
  $$('a',menu).forEach(link=>link.addEventListener('click',()=>setMenu(false)));
  matchMedia('(min-width:1024px)').addEventListener('change',event=>{if(event.matches&&menuOpen) {menuOpen=false;menu.inert=true;menu.classList.remove('is-open');menuTrigger.setAttribute('aria-expanded','false');document.body.classList.remove('is-locked');}});

  let dialogTrigger;
  function closeDialog(dialog) { if(dialog?.open) dialog.close(); }
  function openDialog(id, trigger) {
    const dialog = document.getElementById(id); if(!dialog) return;
    dialogTrigger = trigger || document.activeElement;
    if(menuOpen){if(menu.contains(dialogTrigger))dialogTrigger=menuTrigger;menuOpen=false;menu.inert=true;menu.classList.remove('is-open');menuTrigger.setAttribute('aria-expanded','false');}
    $$('dialog[open]').forEach(closeDialog);
    dialog.showModal();document.body.classList.add('is-locked');window.dispatchEvent(new CustomEvent('care-overlay',{detail:{open:true}}));
    if(id==='ask-dialog') { renderAnswers('');requestAnimationFrame(()=>$('[data-ask-input]').focus()); }
    if(id==='typing-dialog') { resetTyping();requestAnimationFrame(()=>$('[data-typing-input]').focus()); }
    if(id==='lounge-dialog') requestAnimationFrame(()=>$('.lounge-board').focus());
  }
  window.openCareDialog = openDialog;
  $$('[data-open]').forEach(button=>button.addEventListener('click',()=>openDialog(button.dataset.open,button)));
  $$('dialog').forEach(dialog=>{
    $('[data-close]',dialog).addEventListener('click',()=>closeDialog(dialog));
    dialog.addEventListener('click',event=>{if(event.target===dialog){const r=dialog.getBoundingClientRect();if(event.clientX<r.left||event.clientX>r.right||event.clientY<r.top||event.clientY>r.bottom)closeDialog(dialog);}});
    dialog.addEventListener('close',()=>{document.body.classList.toggle('is-locked',!!$('dialog[open]'));if(dialog.id==='typing-dialog')clearInterval(typingTimer);if(!$('dialog[open]')&&dialogTrigger?.isConnected)dialogTrigger.focus({preventScroll:true});window.dispatchEvent(new CustomEvent('care-overlay',{detail:{open:false}}));});
  });
  // Explicit menu focus loop; native modal dialogs supply their own focus trap.
  document.addEventListener('keydown',event=>{
    const editing = event.target.matches('input,textarea,select,[contenteditable="true"]');
    if(event.key==='Escape'&&menuOpen){event.preventDefault();setMenu(false);}
    if(menuOpen&&event.key==='Tab') { const elements=$$('a,button',menu).filter(el=>el.getBoundingClientRect().height);const first=elements[0],last=elements.at(-1);if(event.shiftKey&&document.activeElement===first){event.preventDefault();last.focus();}else if(!event.shiftKey&&document.activeElement===last){event.preventDefault();first.focus();} }
    if((event.metaKey||event.ctrlKey)&&!event.altKey&&['k','j'].includes(event.key.toLowerCase())) {event.preventDefault();const id=event.key.toLowerCase()==='k'?'ask-dialog':'typing-dialog';if(document.getElementById(id).open)closeDialog(document.getElementById(id));else openDialog(id);}
    if(event.key==='/'&&!editing&&!$('dialog[open]')&&$('[data-resource-search]')){event.preventDefault();$('[data-resource-search]').focus();}
  });
  $$('.mod-key').forEach(el=>el.textContent=/Mac|iPhone|iPad/.test(navigator.platform)?'⌘':'Ctrl');

  const detail=$('[data-detail-content]');
  function showDetail({title,label,body,features=[],link='',linkText='',note=''},trigger) {
    detail.innerHTML=`<span class="eyebrow">${escapeHTML(label)}</span><h2 id="detail-title">${escapeHTML(title)}</h2><p>${escapeHTML(body)}</p>${features.length?`<ul>${features.map(f=>`<li>${escapeHTML(f)}</li>`).join('')}</ul>`:''}${link?`<a class="button button-dark" href="${escapeHTML(link)}" ${link.startsWith('assets/downloads/')?'download':''}>${escapeHTML(linkText)} →</a>`:''}${note?`<p class="sample-note">${escapeHTML(note)}</p>`:''}`;
    openDialog('detail-dialog',trigger);
  }
  $$('[data-project]').forEach(button=>button.addEventListener('click',event=>{event.stopPropagation();const project=data.projects[Number(button.dataset.project)];showDetail({title:project.name+' — '+project.subtitle,label:project.tag,body:project.details,features:project.features,link:button.dataset.project==='2'?'shop.html':'contact.html#inquiry',linkText:button.dataset.project==='2'?'Explore the guides':'Let’s connect',note:'ILLUSTRATIVE CONCEPT · FICTIONAL PRACTICE'},button);}));
  $$('[data-credential]').forEach(button=>button.addEventListener('click',()=>{const item=data.credentials[Number(button.dataset.credential)];showDetail({title:item.name,label:'PROFESSIONAL LEARNING CONCEPT',body:'This card explores an area of professional learning. It is not a qualification or a verified credential.',features:[item.issuer,'Concept year: '+item.year,'Area: '+item.category],note:'NOT A VERIFIED CLINICAL CREDENTIAL'},button);}));
  $$('[data-resource]').forEach(button=>button.addEventListener('click',()=>{const item=data.resources[Number(button.dataset.resource)];showDetail({title:item.title,label:item.category,body:item.detail,link:item.download?'assets/downloads/'+item.download:'shop.html',linkText:item.download?'Download free template':'Explore the care guides',note:'An organizational resource, not personalized medical guidance.'},button);}));
  $$('[data-info]').forEach(button=>button.addEventListener('click',()=>showDetail(button.dataset.info==='approach'?{title:'Patient safety comes first.',label:'MY PROFESSIONAL APPROACH',body:'In my work as a Virtual Safety Companion, I monitor patients, respond to alarms, and coordinate with the medical team. Staying composed, communicating clearly, and following established procedures guide my approach.',features:['Patient safety awareness','Clear communication','Accountability and teamwork'],link:'stack.html',linkText:'Explore my strengths'}:{title:'Three ideas for better care',label:'SMALL IDEAS, THOUGHTFULLY MADE',body:'Open Door, Common Ground, and Care Notes explore a more personal healthcare experience. Each is a fictional concept, built around the people who might use it.',features:data.projects.map(p=>p.name+' — '+p.subtitle),link:'projects.html',linkText:'Explore all initiatives'},button)));

  // Three-card spotlight deck: click, keyboard arrows, and swipe.
  const deck=$('[data-deck]');
  if(deck){const cards=$$('[data-card]',deck);let center=0,startX=0;
    function select(index){center=(index+cards.length)%cards.length;cards.forEach((card,i)=>{card.classList.remove('is-center','is-left','is-right');card.classList.add(i===center?'is-center':i===(center+1)%3?'is-left':'is-right');$('[data-card-select]',card).setAttribute('aria-pressed',i===center);const inner=$('[data-project]',card);if(inner)inner.tabIndex=i===center?0:-1;});$('[data-deck-status]').textContent=data.projects[center].name+' selected.';}
    cards.forEach((card,i)=>{card.addEventListener('click',()=>select(i));card.addEventListener('keydown',event=>{if(event.target!==card)return;if(event.key==='Enter'||event.key===' '){event.preventDefault();select(i);}});});
    deck.addEventListener('keydown',event=>{if(['ArrowLeft','ArrowRight'].includes(event.key)){event.preventDefault();select(center+(event.key==='ArrowRight'?1:-1));$('[data-card-select]',cards[center]).focus({preventScroll:true});}});
    deck.addEventListener('touchstart',event=>{startX=event.changedTouches[0].clientX;},{passive:true});deck.addEventListener('touchend',event=>{const distance=event.changedTouches[0].clientX-startX;if(Math.abs(distance)>40)select(center+(distance<0?1:-1));},{passive:true});select(0);
  }

  const resourceSearch=$('[data-resource-search]');
  resourceSearch?.addEventListener('input',()=>{const term=resourceSearch.value.trim().toLocaleLowerCase();let count=0;$$('[data-resource]').forEach(card=>{const show=card.dataset.search.includes(term);card.hidden=!show;if(show)count++;});$$('.resource-category').forEach(category=>category.hidden=!$('[data-resource]:not([hidden])',category));$('[data-resource-empty]').hidden=count>0;$('[data-resource-count]').textContent=`${count} resource${count===1?'':'s'} · all available locally`;});
  let activeCategory='All',blogPage=1;
  function renderBlog(){const rows=$$('[data-blog-category]');if(!rows.length)return;const matches=rows.filter(row=>activeCategory==='All'||row.dataset.blogCategory===activeCategory);const pages=Math.max(1,Math.ceil(matches.length/3));blogPage=Math.min(blogPage,pages);rows.forEach(row=>row.hidden=true);matches.slice((blogPage-1)*3,blogPage*3).forEach(row=>row.hidden=false);$('[data-blog-page]').textContent=blogPage+' / '+pages;$('[data-blog-prev]').disabled=blogPage===1;$('[data-blog-next]').disabled=blogPage===pages;$('[data-blog-empty]').hidden=matches.length>0;}
  $$('[data-blog-filter]').forEach(button=>button.addEventListener('click',()=>{activeCategory=button.dataset.blogFilter;blogPage=1;$$('[data-blog-filter]').forEach(b=>{const active=b===button;b.classList.toggle('active',active);b.setAttribute('aria-pressed',active);});renderBlog();}));
  $('[data-blog-prev]')?.addEventListener('click',()=>{blogPage--;renderBlog();});$('[data-blog-next]')?.addEventListener('click',()=>{blogPage++;renderBlog();});renderBlog();
  $$('[data-blog-view]').forEach(button=>button.addEventListener('click',()=>{$('.blog-list').classList.toggle('grid-view',button.dataset.blogView==='grid');$$('[data-blog-view]').forEach(el=>el.setAttribute('aria-pressed',el===button));}));

  const askInput=$('[data-ask-input]');
  function renderAnswers(term){const words=term.toLocaleLowerCase().trim().split(/\s+/).filter(Boolean);const matches=data.faqs.map((faq,index)=>({faq,index})).filter(({faq})=>!words.length||words.every(word=>(faq.question+' '+faq.answer).toLocaleLowerCase().includes(word)));$('[data-ask-results]').innerHTML=matches.length?matches.map(({faq,index})=>`<button class="ask-result" data-faq="${index}" aria-expanded="false"><span>${escapeHTML(faq.question)}</span><span>↗</span></button>`).join(''):'<p class="ask-answer">No matching answer yet. Try “guides”, “consultation”, “privacy”, or “community”.</p>';}
  askInput.addEventListener('input',()=>renderAnswers(askInput.value));
  askInput.addEventListener('keydown',event=>{if(event.key==='Enter'){event.preventDefault();$('.ask-result')?.click();}});
  $('[data-ask-results]').addEventListener('click',event=>{const button=event.target.closest('[data-faq]');if(!button)return;const open=button.getAttribute('aria-expanded')==='true';$$('.ask-answer',$('[data-ask-results]')).forEach(el=>el.remove());$$('[data-faq]').forEach(el=>el.setAttribute('aria-expanded','false'));if(!open){button.setAttribute('aria-expanded','true');const answer=document.createElement('p');answer.className='ask-answer';answer.textContent=data.faqs[Number(button.dataset.faq)].answer;button.after(answer);}});

  $$('[data-demo-form]').forEach(form => {
    let preparing = false;
    form.addEventListener('submit', event => {
      event.preventDefault();
      if (preparing || !form.reportValidity()) return;
      const button = $('button[type="submit"]', form);
      const label = $('[data-submit-label]', button);
      const spinner = $('.form-spinner', button);
      const arrow = $('[data-submit-icon]', button);
      const feedback = $('.form-feedback', form);
      preparing = true;
      button.disabled = true;
      button.classList.add('is-loading');
      button.setAttribute('aria-busy', 'true');
      label.textContent = 'Preparing…';
      spinner.hidden = false;
      arrow.hidden = true;
      feedback.hidden = false;
      feedback.textContent = 'Preparing your message…';
      // This is a local UI transition, not an email delivery request.
      setTimeout(() => {
        const title = document.createElement('strong');
        title.textContent = 'Thank you for reaching out. Please allow some time for my response.';
        feedback.replaceChildren(title);
        button.disabled = false;
        button.classList.remove('is-loading');
        button.removeAttribute('aria-busy');
        label.textContent = 'Prepare message';
        spinner.hidden = true;
        arrow.hidden = false;
        preparing = false;
        feedback.focus({ preventScroll: true });
        feedback.scrollIntoView({ behavior: reduce.matches ? 'instant' : 'smooth', block: 'nearest' });
      }, 1200);
    });
  });
  $$('[data-service]').forEach(link=>link.addEventListener('click',()=>{const select=$('select[name="topic"]');const option=[...select.options].find(option=>option.textContent.toLowerCase()===link.dataset.service.toLowerCase());if(option)select.value=option.value;setTimeout(()=>$('input[name="name"]').focus({preventScroll:true}),reduce.matches?0:400);}));
  $('[data-copy-link]')?.addEventListener('click',async event=>{const button=event.currentTarget;try{await navigator.clipboard.writeText(location.href);button.textContent='Link copied ✓';setTimeout(()=>button.textContent='Copy article link ↗',2200);}catch{toast('Select and copy the address in your browser.');}});

  // A real, local 30-second typing test. Timer starts on first input.
  const typingInput=$('[data-typing-input]');
  const passages=[
    'care begins with a moment to listen. people bring their stories and questions. a thoughtful conversation makes room for both. clear words and small acts of kindness help us feel connected. take your time and keep a little space for curiosity. together we can make everyday care feel more human.',
    'a little care can make an ordinary day feel different. ask a question and give someone time to answer. notice the small things. share what matters to you. good conversations grow from understanding and a willingness to learn. community starts with people who make room for one another.'
  ];
  let passageIndex=-1,targetText='',typingStart=0,typingTimer=0,finished=false;
  function resetTyping(){clearInterval(typingTimer);passageIndex=(passageIndex+1)%passages.length;targetText=passages[passageIndex];typingStart=0;finished=false;typingInput.disabled=false;typingInput.value='';$('[data-wpm]').textContent='0';$('[data-accuracy]').textContent='100';$('[data-elapsed]').textContent='0';$('.typing-result').hidden=true;$('[data-typing-text]').innerHTML=[...targetText].map((char,i)=>`<span${i===0?' class="current"':''}>${escapeHTML(char)}</span>`).join('');$('[data-typing-text]').scrollTop=0;}
  function metrics(){const value=typingInput.value;let correct=0;[...value].forEach((char,i)=>{if(char===targetText[i])correct++;});const elapsed=typingStart?Math.min(30,(performance.now()-typingStart)/1000):0;return {correct,elapsed,accuracy:value.length?Math.round(correct/value.length*100):100,wpm:elapsed>0?Math.round(correct/5/(elapsed/60)):0};}
  function updateTyping(){const result=metrics();$('[data-wpm]').textContent=result.wpm;$('[data-accuracy]').textContent=result.accuracy;$('[data-elapsed]').textContent=Math.floor(result.elapsed);if(result.elapsed>=30||typingInput.value.length>=targetText.length)finishTyping();}
  function finishTyping(){if(finished)return;finished=true;clearInterval(typingTimer);typingInput.disabled=true;const result=metrics();$('.typing-result').hidden=false;$('.typing-result').textContent=`${result.wpm} words per minute · ${result.accuracy}% accuracy · ${Math.round(result.elapsed)} seconds. A little focus, well spent.`;$('[data-typing-reset]').focus({preventScroll:true});}
  typingInput.addEventListener('input',()=>{if(finished)return;if(!typingStart){typingStart=performance.now();typingTimer=setInterval(updateTyping,100);}if(typingInput.value.length>targetText.length)typingInput.value=typingInput.value.slice(0,targetText.length);const spans=$$('span',$('[data-typing-text]'));spans.forEach((span,i)=>{span.className=i<typingInput.value.length?(typingInput.value[i]===targetText[i]?'correct':'wrong'):i===typingInput.value.length?'current':'';});const current=spans[typingInput.value.length];if(current){const holder=$('[data-typing-text]');holder.scrollTop=Math.max(0,current.offsetTop-holder.offsetTop-45);}updateTyping();});
  typingInput.addEventListener('paste',event=>event.preventDefault());
  typingInput.addEventListener('keydown',event=>{const key=$$('[data-key]').find(el=>el.dataset.key===event.key.toLowerCase());if(key){key.classList.add('is-pressed');setTimeout(()=>key.classList.remove('is-pressed'),140);}});
  $('[data-typing-reset]').addEventListener('click',()=>{resetTyping();typingInput.focus();});

  // Local lounge: a movable avatar and transparent, predefined conversation prompts.
  const board=$('.lounge-board'),avatar=$('[data-lounge-avatar]');let avatarX=0,avatarY=0;
  board.addEventListener('keydown',event=>{const key=event.key.toLowerCase();const directions={arrowup:[0,-12],w:[0,-12],arrowdown:[0,12],s:[0,12],arrowleft:[-12,0],a:[-12,0],arrowright:[12,0],d:[12,0]};if(!directions[key])return;event.preventDefault();const [x,y]=directions[key];avatarX=Math.max(-board.clientWidth*.24+4,Math.min(board.clientWidth*.76-48,avatarX+x));avatarY=Math.max(-board.clientHeight*.5+8,Math.min(board.clientHeight*.5-65,avatarY+y));avatar.style.transform=`translate(${avatarX}px,${avatarY}px)`;});
  const replies={hello:'Hello, and welcome. It’s lovely to have you here. This little lounge is yours to explore.',explore:'Try the journal for a few thoughtful notes, the guides for free downloads, or the initiatives for three ideas about better care.',care:'A kind thought for today: you don’t need to have all the right words. Sometimes a little space to listen is enough.'};
  $$('[data-lounge-prompt]').forEach(button=>button.addEventListener('click',()=>{$('.lounge-message').textContent=replies[button.dataset.loungePrompt];}));
})();
