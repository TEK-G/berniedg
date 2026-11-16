(() => {
  'use strict';
  const profile=JSON.parse(document.getElementById('site-data').textContent).site;
  const reduce=matchMedia('(prefers-reduced-motion: reduce)');
  if(!reduce.matches&&'IntersectionObserver' in window){
    const observer=new IntersectionObserver(entries=>entries.forEach(entry=>{if(entry.isIntersecting){entry.target.classList.add('is-revealed');observer.unobserve(entry.target);}}),{threshold:.04,rootMargin:'0px 0px -16px 0px'});
    document.querySelectorAll('.home-section,.project-feature,.kit-section,.timeline-item,.specialty-category').forEach(section=>{section.classList.add('js-reveal');observer.observe(section);});
  }
  const desktop=matchMedia('(min-width:1024px) and (hover:hover) and (pointer:fine)');
  // A compact guided introduction, reflecting the reference's pointer tour.
  const pointer=document.querySelector('.guide-cursor'),text=document.querySelector('[data-guide-text]'),prompt=document.querySelector('.guide-prompt');
  if(!desktop.matches||reduce.matches||document.body.dataset.page!=='home')return;
  const session={get(key){try{return sessionStorage.getItem(key);}catch{return null;}},set(key,value){try{sessionStorage.setItem(key,value);}catch{}}};
  let running=false,cancelled=false,timer=0,raf=0,current={x:innerWidth+40,y:innerHeight*.4},goal={...current},typingInterval=0;
  const steps=[
    ['name',`Hi, I’m ${profile.first_name}. Make yourself at home.`],
    ['socials','A few ways to explore the story behind the care.'],
    ['stats','People first. Small ideas for better care.'],
    ['blog','A little journal about people, community, and care.'],
    ['resources','Simple resources, ready when you are.'],
    ['contact','Have an opportunity or a question? Let’s connect.'],
    ['brand','That’s the little tour. Take your time and explore.']
  ];
  const pause=ms=>new Promise(resolve=>{timer=setTimeout(resolve,ms);});
  function move(){current.x+=(goal.x-current.x)*.09;current.y+=(goal.y-current.y)*.09;pointer.style.transform=`translate3d(${current.x}px,${current.y}px,0)`;if(running)raf=requestAnimationFrame(move);}
  function stop(){cancelled=true;running=false;clearInterval(typingInterval);cancelAnimationFrame(raf);pointer.classList.remove('is-visible');if(session.get('care-tour-prompt')!=='off')prompt.hidden=false;}
  async function run(){if(running)return;running=true;cancelled=false;prompt.hidden=true;session.set('care-tour-seen','yes');current={x:innerWidth+40,y:innerHeight*.4};move();await pause(550);pointer.classList.add('is-visible');
    for(const [target,message] of steps){
      if(cancelled)return;
      if(document.querySelector('dialog[open]')){stop();return;}
      const element=[...document.querySelectorAll(`[data-tour-target="${target}"]`)].find(el=>el.getBoundingClientRect().width>0);if(!element)continue;
      const r=element.getBoundingClientRect();if(r.bottom>innerHeight||r.top<0)continue;
      goal={x:Math.min(innerWidth-260,r.right+8),y:Math.min(innerHeight-110,r.bottom+5)};if(target==='name')goal={x:r.left+8,y:Math.max(20,r.top-57)};
      text.textContent='';await pause(750);if(cancelled)return;
      await new Promise(resolve=>{let i=0;typingInterval=setInterval(()=>{if(cancelled){clearInterval(typingInterval);resolve();return;}text.textContent=message.slice(0,++i);if(i>=message.length){clearInterval(typingInterval);resolve();}},20);});
      await pause(1700);
    }
    if(cancelled)return;goal={x:innerWidth+80,y:innerHeight*.35};await pause(900);stop();
  }
  document.querySelector('[data-tour-replay]').addEventListener('click',run);
  document.querySelector('[data-tour-dismiss]').addEventListener('click',()=>{prompt.hidden=true;session.set('care-tour-prompt','off');});
  window.addEventListener('care-overlay',event=>{if(event.detail.open&&running)stop();});
  window.addEventListener('scroll',()=>{if(running)stop();},{passive:true});
  desktop.addEventListener('change',()=>{if(!desktop.matches)stop();});
  document.addEventListener('keydown',event=>{if(event.key==='Escape'&&running)stop();});
  if(!session.get('care-tour-seen'))run();else if(session.get('care-tour-prompt')!=='off')prompt.hidden=false;
})();
