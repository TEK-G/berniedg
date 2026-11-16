<?php
declare(strict_types=1);

$site = [
    'name' => 'Bernadette Jazmine MDG',
    'full_name' => 'Bernadette Jazmine Mapindan De guzman',
    'first_name' => 'Bernadette',
    'name_lines' => ['Bernadette', 'Jazmine MDG'],
    'initials' => 'BJ',
    'title' => 'Patient safety, with a human touch.',
    'email' => 'hello@bernadettejazzmine.example',
    'resume_path' => 'assets/downloads/De_Guzman_Resume_(2026).pdf',
    'resume_filename' => 'De_Guzman_Resume_(2026).pdf',
    'resume_year' => '2026',
];
// Temporarily hidden sections. Set a section to true when its content is ready.
$sectionVisibility = [
    'certifications' => false,
    'recommendations' => false,
    'affiliations' => false,
    'community_activity' => false,
];
$profile = [
    'degree' => 'Bachelor of Science in Biology',
    'major' => 'Zoology',
    'role' => 'Virtual Safety Companion',
    'organization' => 'Bon Secours Mercy Health GBS Manila',
    'paragraphs' => [
        'I am a Bachelor of Science in Biology graduate, major in Zoology, currently working as a Virtual Safety Companion at Bon Secours Mercy Health GBS Manila. My experience in virtual patient monitoring has allowed me to develop a strong appreciation for patient safety, effective communication, attention to detail, and teamwork.',
        'In my current role, I monitor patients through multiple camera feeds, respond to alarms, provide appropriate verbal redirection, document interventions, and coordinate with the medical team when necessary.',
        'Working in a healthcare support environment, I have been exposed to how fast-paced and demanding the job is. It has taught me the importance of staying composed, being accountable, and understanding how every member of the team contributes to patient safety.',
    ],
];
$workExperience = [
    'overview' => 'My primary responsibility is to maintain patient safety through continuous virtual observation, timely intervention, and effective communication.',
    'areas' => [
        [
            'number'=>'01', 'slug'=>'patient-monitoring', 'title'=>'Patient Monitoring', 'icon'=>'monitor',
            'responsibilities'=>[
                'Monitor multiple patient camera feeds simultaneously.',
                'Maintain awareness of patient behavior and potential safety risks.',
                'Conduct routine observation and listening checks.',
            ],
        ],
        [
            'number'=>'02', 'slug'=>'patient-intervention', 'title'=>'Patient Intervention', 'icon'=>'shield',
            'responsibilities'=>[
                'Provide appropriate verbal redirection and initiate STAT alarms if needed when patients attempt to leave their beds or remove medical devices.',
                'Respond to situations requiring immediate attention.',
                'Identify which situations require immediate intervention when two or more occur simultaneously.',
                'Follow established escalation protocols.',
            ],
        ],
        [
            'number'=>'03', 'slug'=>'documentation-communication', 'title'=>'Documentation and Communication', 'icon'=>'article',
            'responsibilities'=>[
                'Document interventions and relevant patient events accurately.',
                'Communicate important updates and information during shift handoff.',
                'Coordinate with the appropriate medical team when necessary.',
            ],
        ],
        [
            'number'=>'04', 'slug'=>'operational-technical-awareness', 'title'=>'Operational and Technical Awareness', 'icon'=>'case',
            'responsibilities'=>[
                'Initiate STAT alarms according to established procedures.',
                'Perform audio and visual checks.',
                'Coordinate technical concerns with the appropriate support team.',
                'Maintain awareness across EST and CST operations.',
            ],
        ],
    ],
    'learning' => [
        'Patient monitoring requires more than simply watching a camera. It requires anticipation, situational awareness, sound judgment, and consistent communication.',
        'I have learned that even small details can have a significant impact on patient safety and continuity of care.',
    ],
];
$professionalStrengths = [
    ['slug'=>'patient-safety-awareness', 'title'=>'Patient Safety Awareness', 'description'=>'Recognizing potential risks and responding immediately with appropriate escalations.', 'icon'=>'shield'],
    ['slug'=>'communication', 'title'=>'Communication', 'description'=>'Providing clear updates and coordinating with the whole team and the medical team to uphold patient safety.', 'icon'=>'chat'],
    ['slug'=>'attention-to-detail', 'title'=>'Attention to Detail', 'description'=>'Maintaining awareness of patient assignments, camera feeds, and relevant sudden changes.', 'icon'=>'article'],
    ['slug'=>'adaptability', 'title'=>'Adaptability', 'description'=>'Managing changing priorities and multiple responsibilities.', 'icon'=>'flower'],
    ['slug'=>'teamwork', 'title'=>'Teamwork', 'description'=>'Supporting the team and contributing to operational continuity.', 'icon'=>'people'],
    ['slug'=>'accountability', 'title'=>'Accountability', 'description'=>'Following established standard operating procedures and taking responsibility for assigned duties.', 'icon'=>'case'],
];
$leadership = [
    'aspirations' => [
        'Every shift has helped me see how much patient safety depends on people working together. Through virtual patient monitoring, I have learned to stay attentive, communicate clearly, and value the support of the people around me.',
        'These experiences make me want to keep growing. I am always ready to explore new ways to contribute, learn from my teammates and Supervisors, and take on greater responsibility. I want to build on my day-to-day work by becoming someone the team can rely on when priorities change or additional support is needed.',
        'For me, growth means staying curious, asking questions, and being willing to help within my scope. I approach new responsibilities with a willingness to learn, respect for established procedures, and a clear focus on patient safety.',
    ],
    'contributions' => [
        ['title'=>'Team Support', 'description'=>'I aim to be approachable and available when fellow VSCs need support, offering guidance and clarification within my scope.', 'icon'=>'people'],
        ['title'=>'Operational Support', 'description'=>'I am ready to learn more about camera assignments and operational coordination, and to help with these responsibilities while following established procedures.', 'icon'=>'monitor'],
        ['title'=>'Communication and Accountability', 'description'=>'I value timely, accurate, and relevant updates to Supervisors, clear communication during handoffs, and taking responsibility for my assigned duties.', 'icon'=>'chat'],
        ['title'=>'Leadership through Example', 'description'=>'I want my everyday actions to reflect professionalism, consistency, and respect. That means communicating constructively, being accountable, and supporting the team while upholding standards.', 'icon'=>'shield'],
    ],
    'view' => [
        'I believe effective leadership is not simply about giving instructions. It is about being someone the team can rely on, setting a good example, recognizing when someone needs support, and knowing when accountability is necessary.',
        'I want to keep growing alongside my team, with the openness to explore new responsibilities and the discipline to stay focused on patient safety.',
    ],
];
$navigation = [
    [['shop', 'Guides', 'bag'], ['blog', 'Journal', 'article'], ['gear', 'My kit', 'stethoscope'], ['resources', 'Resources', 'book']],
    [['contact', 'Let’s connect', 'mail']],
    [['experience', 'About me', ''], ['professional-experience', 'Experience', ''], ['stack', 'Strengths', ''], ['leadership', 'Leadership', ''], ['projects', 'Initiatives', ''], ['certifications', 'Credentials', ''], ['recommendations', 'Kind words', ''], ['affiliations', 'Affiliations', '']],
];
$articles = [
    ['slug'=>'care-starts-with-listening','title'=>'Good care starts with listening','excerpt'=>'Sometimes the most useful thing in the room isn’t a new test. It’s the space to be heard.','date'=>'Nov 2026','category'=>'Care notes','minutes'=>3,'body'=>[
        ['The space before an answer', 'A thoughtful conversation begins with room for someone to tell their story. In this fictional practice, the starting point is simple: what brought you here, and what matters most to you today? A person’s priorities give a conversation direction.'],
        ['A little preparation goes a long way', 'Before a visit, it can help to write down what you want to discuss and which questions you most want answered. You don’t need a polished explanation. A few words in a notebook can be enough to begin.'],
        ['Make room for your questions', 'You should be able to ask what a word means, request a simpler explanation, or say that you need a moment. The visit-preparation template in the guides collection offers a place for those questions.'],
        ['Leave with a shared understanding', 'At the end of a conversation, summarize the next steps in your own words and check that you and your care team understand the same plan. This journal explores communication and the experience of care, rather than providing personal medical guidance.'],
    ]],
    ['slug'=>'a-more-human-checkup','title'=>'Making the everyday checkup more human','excerpt'=>'A visit is more than a checklist. A few thoughts on making room for the person behind the appointment.','date'=>'Oct 2026','category'=>'In practice','minutes'=>4,'body'=>[
        ['More than a time slot', 'An appointment starts long before someone enters a room. There is the calendar to coordinate, the journey to make, and sometimes a question that has been difficult to put into words. Good design considers that whole experience.'],
        ['Small details, better conversations', 'A clearly written welcome, a comfortable place to sit, and an invitation to ask questions all influence how a conversation feels. In the Open Door concept, these details shape a considered visit journey.'],
        ['A clear way forward', 'An understandable summary gives a person something to return to after a conversation. It can name what was discussed, what happens next, and who to contact with questions. Explore the appointment-notes guide to see one possible format.'],
    ]],
    ['slug'=>'beyond-the-clinic','title'=>'Taking care beyond the clinic walls','excerpt'=>'Community, connection, and the small moments that make healthcare feel closer to home.','date'=>'Oct 2026','category'=>'Community','minutes'=>3,'body'=>[
        ['Care belongs in the community', 'A library meeting room, a neighborhood gathering, or a conversation with a volunteer can be a welcoming place to learn about navigating care. This portfolio imagines community programs that make those conversations easier.'],
        ['Start by asking', 'The Common Ground concept begins with a listening session. What makes it difficult to find information? What would make a community event feel welcoming? The answers help shape a more considerate experience.'],
        ['Build together', 'Community collaborators bring different perspectives, languages, and lived experiences. The Contact me page includes a form for preparing an inquiry about an educational event or accessible resource project.'],
    ]],
    ['slug'=>'questions-worth-bringing','title'=>'The questions worth bringing to your next visit','excerpt'=>'A simple place to begin when you’re not sure what to ask.','date'=>'Sep 2026','category'=>'Care notes','minutes'=>2,'body'=>[
        ['Start with what matters', 'Write down your main reason for the visit and anything you hope to understand by the end. Your priorities belong in the conversation.'],
        ['Ask for an explanation', 'You can ask your clinician to explain unfamiliar language, outline the next steps, or write something down. The visit-preparation guide has room for these prompts.'],
        ['Keep your notes together', 'Bring a list of questions and leave room for the answers. Use your care team’s guidance for your individual situation; the templates here are organizational tools.'],
    ]],
    ['slug'=>'plain-language','title'=>'Plain language is part of compassionate care','excerpt'=>'Clear words help us have better conversations.','date'=>'Aug 2026','category'=>'In practice','minutes'=>3,'body'=>[
        ['Words are part of the experience', 'Healthcare has a language of its own. When a conversation uses familiar words and explains unfamiliar ones, there is more room for understanding.'],
        ['A shared understanding', 'A useful explanation starts with the person listening. Ask what they already know, break ideas into small pieces, and invite questions throughout. These are principles behind this portfolio’s fictional resource library.'],
        ['Make the next step visible', 'A short summary with clear contact details and an understandable next step can make written communication easier to navigate. Good information design is an ongoing conversation.'],
    ]],
    ['slug'=>'a-practice-in-progress','title'=>'A practice, always in progress','excerpt'=>'Notes on curiosity, collaboration, and continuing to learn.','date'=>'Jul 2026','category'=>'Personal','minutes'=>2,'body'=>[
        ['Stay curious', 'Every conversation offers a chance to notice something new. This fictional portfolio is built around curiosity about people, care, and the places where they meet.'],
        ['Learn with others', 'This portfolio brings patient monitoring, community education, and collaboration together. The aim is a coherent picture of person-centered care, with professional experience and portfolio concepts presented clearly.'],
        ['Keep the conversation open', 'Browse the initiatives for examples of this approach, or try the local consultation form to explore the website’s interaction design. No inquiry is transmitted.'],
    ]],
];
$projects = [
    ['name'=>'Open Door', 'subtitle'=>'Care that starts with you', 'description'=>'A thoughtful primary-care experience, built around listening and a shared plan.', 'icon'=>'heart', 'color'=>'sage', 'tag'=>'PERSON-CENTERED CARE', 'tags'=>['PRIMARY CARE','CONCEPT PROJECT'], 'details'=>'Open Door is an illustrative care journey: a clear welcome, time to discuss priorities, and a written summary of the conversation. The concept explores how small design decisions can make a visit feel more personal.', 'features'=>['A welcoming first visit','Space for your questions','Clear next steps']],
    ['name'=>'Common Ground', 'subtitle'=>'Wellness, together', 'description'=>'Bringing useful conversations about care into the heart of the community.', 'icon'=>'people', 'color'=>'clay', 'tag'=>'COMMUNITY WELLNESS', 'tags'=>['EDUCATION','CONCEPT PROJECT'], 'details'=>'Common Ground imagines neighborhood workshops and listening sessions developed with community volunteers. Its focus is an inclusive, approachable experience rather than medical treatment.', 'features'=>['Community listening sessions','Accessible workshop materials','Local collaboration']],
    ['name'=>'Care Notes', 'subtitle'=>'A little more clarity', 'description'=>'Simple, human resources that help people prepare for their next conversation.', 'icon'=>'article', 'color'=>'blue', 'tag'=>'PATIENT EDUCATION', 'tags'=>['PLAIN LANGUAGE','CONCEPT PROJECT'], 'details'=>'Care Notes is a collection of original organizational templates: questions for a visit, appointment notes, and a personal care-team directory. Each download is a static text file, ready to print or adapt.', 'features'=>['Free visit templates','Plain-language layouts','No accounts or data collection']],
];
$experience = [
    ['year'=>'Current','role'=>$profile['role'],'organization'=>$profile['organization'],'period'=>'Current role','description'=>$profile['paragraphs'][1],'skills'=>['Virtual patient monitoring','Alarm response','Verbal redirection','Intervention documentation','Medical team coordination']],
];
$credentials = [
    ['name'=>'Family Medicine','issuer'=>'PROFESSIONAL LEARNING CONCEPT','icon'=>'shield','year'=>'2025','category'=>'Clinical'],
    ['name'=>'Community Health','issuer'=>'PUBLIC HEALTH LEARNING CONCEPT','icon'=>'people','year'=>'2024','category'=>'Community'],
    ['name'=>'Patient-Centered Care','issuer'=>'CONTINUING EDUCATION CONCEPT','icon'=>'heart','year'=>'2024','category'=>'Clinical'],
    ['name'=>'Clinical Communication','issuer'=>'COMMUNICATION LEARNING CONCEPT','icon'=>'chat','year'=>'2023','category'=>'Education'],
    ['name'=>'Health Literacy','issuer'=>'EDUCATION CONCEPT','icon'=>'book','year'=>'2023','category'=>'Education'],
    ['name'=>'Collaborative Leadership','issuer'=>'PROFESSIONAL DEVELOPMENT CONCEPT','icon'=>'case','year'=>'2022','category'=>'Community'],
];
$testimonials = [
    ['quote'=>'Bernadette brings a thoughtful, human perspective to every conversation. There is always room to ask another question.','name'=>'Jamie Chen','role'=>'COLLEAGUE PERSPECTIVE','initials'=>'JC'],
    ['quote'=>'A wonderful collaborator who makes complex ideas feel approachable. The attention to clear communication really stands out.','name'=>'Sarah Williams','role'=>'COMMUNITY PARTNER PERSPECTIVE','initials'=>'SW'],
    ['quote'=>'Curious, considerate, and always willing to listen. Bernadette makes the people around her feel like part of the team.','name'=>'Daniel Reyes','role'=>'TEAM MEMBER PERSPECTIVE','initials'=>'DR'],
    ['quote'=>'The workshop concept puts people first. Every detail, from the welcome to the take-home notes, feels carefully considered.','name'=>'Emma Patel','role'=>'EDUCATION PARTNER PERSPECTIVE','initials'=>'EP'],
    ['quote'=>'I appreciate the emphasis on simple language and shared understanding. It is a thoughtful vision for everyday care.','name'=>'Noah Thompson','role'=>'CLINICAL PEER PERSPECTIVE','initials'=>'NT'],
    ['quote'=>'A collaborative spirit and a generous approach to learning. There is a real sense of care in the way this work is imagined.','name'=>'Lily Santos','role'=>'MENTOR PERSPECTIVE','initials'=>'LS'],
];
$affiliations = [
    ['name'=>'Open Door','role'=>'CLINICAL PRACTICE','icon'=>'plus','description'=>'A fictional neighborhood practice focused on person-centered primary care.'],
    ['name'=>'Common Ground','role'=>'COMMUNITY HEALTH','icon'=>'people','description'=>'An illustrative community collective bringing people together around accessible health education.'],
    ['name'=>'Care Collective','role'=>'EDUCATION NETWORK','icon'=>'flower','description'=>'A concept network for sharing clear communication and thoughtful care experiences.'],
];
$resources = [
    ['title'=>'Before your appointment','category'=>'Visit preparation','description'=>'A simple worksheet for your priorities and questions.','detail'=>'Use the original visit-preparation template to make a short list of the things you want to discuss. It includes space for questions and practical arrangements.','download'=>'visit-preparation.txt','icon'=>'article'],
    ['title'=>'Your appointment notes','category'=>'Visit preparation','description'=>'Keep your conversation and next steps in one place.','detail'=>'An organizational template with room for the date, topics discussed, questions, follow-up arrangements and care-team contact details.','download'=>'appointment-notes.txt','icon'=>'book'],
    ['title'=>'A place for your care team','category'=>'Everyday organization','description'=>'A printable directory for the people involved in your care.','detail'=>'A blank directory for names, roles, phone numbers and office hours. Fill it in offline and keep it wherever it is useful to you.','download'=>'care-team.txt','icon'=>'people'],
    ['title'=>'Making space for questions','category'=>'Better conversations','description'=>'Simple prompts for a more comfortable conversation.','detail'=>'Try beginning with “What matters most to me today is…” or asking “Could you explain that in another way?” Use your own words and ask for time when you need it.','icon'=>'chat'],
    ['title'=>'Understanding the next step','category'=>'Better conversations','description'=>'A reminder to leave with a shared understanding.','detail'=>'Before a visit ends, consider asking who to contact with questions, how follow-up will happen, and whether you can have a written summary. Your own clinician can clarify the plan for your situation.','icon'=>'arrow'],
    ['title'=>'Community workshop toolkit','category'=>'Community','description'=>'An outline for welcoming, inclusive educational events.','detail'=>'A fictional event-planning outline: listen to the community, choose an accessible venue, prepare plain-language materials, and invite feedback. Explore the Common Ground initiative for context.','icon'=>'flower'],
];
$services = [
    ['title'=>'Primary care','type'=>'A place to begin','description'=>'An unhurried conversation about your priorities and what comes next.','icon'=>'stethoscope','tags'=>['First visits','Follow-up','Shared planning']],
    ['title'=>'Preventive care','type'=>'Looking ahead','description'=>'Space to talk about everyday wellbeing and questions for your care team.','icon'=>'shield','tags'=>['Your priorities','Whole-person care','Continuity']],
    ['title'=>'Care coordination','type'=>'Connecting the dots','description'=>'A considered approach to communication across a care journey.','icon'=>'heart','tags'=>['Teamwork','Clear information','Next steps']],
    ['title'=>'Community workshops','type'=>'Learning together','description'=>'Welcoming educational sessions shaped around the people in the room.','icon'=>'people','tags'=>['Community groups','Accessible learning','Collaboration']],
    ['title'=>'Health communication','type'=>'Words that connect','description'=>'Plain-language resource concepts and thoughtful patient experiences.','icon'=>'article','tags'=>['Resource design','Health literacy','Clear language']],
    ['title'=>'Clinical mentoring','type'=>'Growing together','description'=>'A collaborative learning concept for early-career healthcare teams.','icon'=>'book','tags'=>['Team learning','Reflection','Communication']],
];
$faqs = [
    ['question'=>'How can I get in touch?','answer'=>'Visit Contact me to prepare and preview an inquiry about a professional opportunity, collaboration, or question. The form does not send or store your information.'],
    ['question'=>'What is my professional background?','answer'=>'I am a Bachelor of Science in Biology graduate, major in Zoology, currently working as a Virtual Safety Companion at Bon Secours Mercy Health GBS Manila. My work involves virtual patient monitoring, alarm response, verbal redirection, documenting interventions, and coordinating with the medical team.'],
    ['question'=>'Are the guides free?','answer'=>'Yes. All three original text templates are free to download. They are organizational tools for visit preparation, appointment notes, and your care-team contacts.'],
    ['question'=>'Whose healthcare portfolio is this?','answer'=>'This portfolio belongs to Bernadette Jazmine Mapindan De guzman, displayed as Bernadette Jazmine MDG. Her profile, experience, strengths, and leadership aspirations use her supplied background. Selected projects are portfolio concepts.'],
    ['question'=>'Does this website collect personal information?','answer'=>'Personal information is not sent or stored by this website. Inquiry fields are cleared when you leave the page. Theme and sound preferences may be saved in your browser.'],
    ['question'=>'Can I collaborate on a community project?','answer'=>'The Contact me page helps you prepare an inquiry about educational events, accessible resources, and community partnerships. The form previews your inquiry without sending a message.'],
    ['question'=>'How do I approach professional growth?','answer'=>'I am always ready to explore new ways to contribute, learn from the people around me, and take on greater responsibility. I want to become someone my team can rely on, while staying within my scope, following established procedures, and keeping patient safety at the center of my work. Explore Leadership for my approach to growth and supporting the team.'],
    ['question'=>'What are my key responsibilities as a Virtual Safety Companion?','answer'=>'My work covers patient monitoring, patient intervention, documentation and communication, and operational and technical awareness. This includes monitoring multiple camera feeds, verbal redirection, STAT alarms according to established procedures, accurate documentation, shift handoffs, and coordination with medical and technical support teams. Explore Experience for the full overview.'],
];
$pageMeta = [
    'shop'=>['guides','A few simple resources I’ve made to help you prepare, ask questions, and keep the important things together. Free to download, yours to use.'],
    'blog'=>['journal','Thoughts, small observations, and notes on healthcare, community, and being human.'],
    'gear'=>['my kit','The everyday essentials behind a thoughtful practice — the tools, notebooks, and little things that come along for the day.'],
    'resources'=>['resources','A small, considered collection for navigating care, preparing for conversations, and feeling a little more organized.'],
    'contact'=>['contact me','Let’s connect. Have a professional opportunity, a collaboration in mind, or a question? I’d love to hear from you.'],
    'collabs'=>['collabs','Good things happen when people care together. I’m interested in community education, accessible resources, and projects with people at their heart.'],
    'consulting'=>['consultations','Thoughtful care starts with a conversation. Here are a few ways this practice imagines working with individuals, communities, and healthcare teams.'],
    'projects'=>['initiatives','Care beyond a single appointment — a few ideas for making healthcare more personal, more understandable, and closer to the community.'],
    'experience'=>['about me','A Biology graduate, major in Zoology, currently supporting patient safety as a Virtual Safety Companion.'],
    'professional-experience'=>['professional experience','My work as a Virtual Safety Companion at Bon Secours Mercy Health GBS Manila.'],
    'stack'=>['professional strengths','The strengths I bring to virtual patient monitoring, healthcare support, and working with the medical team.'],
    'leadership'=>['leadership readiness','Always ready to learn, explore new responsibilities, and support the people I work with.'],
    'certifications'=>['credentials','A commitment to learning throughout a career in care. These professional-learning concepts are not verified qualifications.'],
    'recommendations'=>['kind words','Illustrative perspectives on teamwork, communication, and care. Names and quotations below are fictional.'],
    'affiliations'=>['affiliations','Communities and organizations that reflect this portfolio’s approach to care. All affiliations shown here are fictional.'],
];
