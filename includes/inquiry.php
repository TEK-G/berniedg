<section class="inquiry-section" id="inquiry">
    <div class="inquiry-heading"><span class="eyebrow"><?=$page==='contact'?'LET’S CONNECT':($page==='collabs'?'COLLABORATION INQUIRY':'CONSULTATION INQUIRY')?></span>
    <h2><?=$page==='contact'?'say hello':'let’s talk about it'?></h2><p class="section-copy">A thoughtful conversation starts with a little context. Use the form below to prepare your inquiry.</p><?=icon('chat')?></div>
    <form class="inquiry-form" data-demo-form>
        <div class="form-grid"><label>Name <span>*</span><input name="name" autocomplete="name" placeholder="Your name" required maxlength="100"></label><label>Email <span>*</span><input type="email" name="email" autocomplete="email" placeholder="you@example.com" required maxlength="180"></label></div>
        <div class="form-grid"><label>Organization<input name="organization" placeholder="Optional" autocomplete="organization" maxlength="150"></label>
        <label>What would you like to discuss? <span>*</span><select name="topic" required><option value="">Choose a topic</option><?php if($page==='contact'):?><option>Professional opportunity</option><option>Collaboration</option><option>Healthcare communication</option><option>General inquiry</option><option>Something else</option><?php else:?><option>Primary care</option><option>Community workshop</option><option>Health communication</option><option>Education &amp; mentoring</option><option>Something else</option><?php endif;?></select></label></div>
        <div class="form-grid"><label>Preferred format<select name="format"><option>A conversation</option><option>In person</option><option>Online</option></select></label><label>Ideal timing<input name="timing" placeholder="e.g. next month, flexible" maxlength="100"></label></div>
        <label>A little more context <span>*</span><textarea name="message" rows="5" placeholder="Tell me a little about what you have in mind…" required minlength="10" maxlength="2000" aria-describedby="form-note"></textarea></label>
        <p class="form-note" id="form-note">This form prepares an inquiry without sending or saving it. Please don’t include medical or sensitive details.</p>
        <div class="form-actions"><span class="required-note">* Required fields</span><button class="button button-dark" type="submit"><span class="form-spinner" aria-hidden="true" hidden></span><span data-submit-label>Prepare message</span><span data-submit-icon><?=icon('arrow')?></span></button></div>
        <div class="form-feedback" role="status" tabindex="-1" hidden></div>
    </form>
</section>
