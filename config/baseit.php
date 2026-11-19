<?php

/*
|--------------------------------------------------------------------------
| BASE IT website content
|--------------------------------------------------------------------------
| All texts, menus, prices and page contents of the public website.
| Edit here to change what the site shows.
|
| Images: bimg('2017/02/main-logo.png') looks for
|   public/welcome/baseit/uploads/2017/02/main-logo.png
| and falls back to the old WordPress uploads URL (image_fallback).
*/

// Intro text used on Dynamic Website / Web Application / Job Portal pages
$dynamicIntro = [
    'When your business outgrows the functionalities that a simple static web site can offer, you need to implement a more complex dynamic web site that is capable to interact with your clients or viewers.',
    'Our expertise lies in clearly perceiving the business goals of our customers, the most appropriate technology and efficiently designing and developing solutions that cater to the business needs identified. Whether you need a dynamic, database-driven website or a fully functioning e-commerce web site, we have the creative talent and technical expertise to accommodate your company\'s web application development needs.',
];

// Rows of one Dynamic Website package column ('# ' = section header row)
$dynamicRows = function ($pages, $cms, array $hosting, $traffic, $days, $extra, $renew) {
    return array_merge([
        'Dynamic Page no: ' . $pages . ' (Including menu and submenu)',
        'Content page body size: A4 size Max',
        'Java Script Banner',
        'Professional unique design',
        'Managing website from Frontend WYSIWYG HTML Editors.',
        'Add / Edit / Remove site Content with HTML skills.',
        'International Standard ' . $cms,
        '# DOMAIN & HOSTING :',
    ], $hosting, [
        $traffic . ' Monthly Data transfer / Traffic.',
        'Unlimited My-Sql Database.',
        'Apache 2.2.x PHP 5.x , Mysql 5.x',
        'Linux Based Hosting server with FTP and cPanel.',
        'All Other Standard Hosting facilities with Control Panel.',
        '# TERMS & CONDITION:',
        'Development Timelines (If content is available): ' . $days . ' working days.',
        'If Client failed to provide the content within 30 days after contract, the project will count as a complete project.',
        'Post-Sales Support: 1 month.',
        'Charges per extra pages: ' . $extra . ' Taka.',
        'If the page size is more the A4 size then additional cost will be 1000 Taka per A4 size Content.',
        'Renew: ' . $renew . ' taka per year for Domain & Hosting.',
        'Domain and hosting must be renewing in every year before 1 month of expired date.',
        'Otherwise additional cost will be added according to the domain hosting renew rules.',
    ]);
};

// Dynamic Website packages (used on "Dynamic Website" and "Website" pages)
$dynamicPackages = [
    ['name' => 'APPLE', 'price' => '25,000tk / $320', 'rows' => $dynamicRows('1-09 pages', 'CMS(WordPress)', [
        '1 GB Hosting under Linux Server for 1 year.', '15 Email address', 'Domain .com .net .org .info Registration',
    ], '3000 MB', 10, '1000', '7000')],
    ['name' => 'ORANGE', 'price' => '50,000tk / $500', 'rows' => $dynamicRows('10-19 pages', 'CMS(WordPress)', [
        'Domain .com .net .org .info Registration.', '2 GB Hosting under Linux Server for 1 year.', '50 Email address',
    ], '5000 MB', 15, '1000', '12,000')],
    ['name' => 'STRAWBERRY', 'price' => '125,000tk / $1500', 'badge' => 'Most Popular', 'rows' => $dynamicRows('20-30 pages', 'PHP-CodeIgniter / CMS(WordPress)', [
        'Domain .com .net .org .info Registration.', '5 GB Hosting under Linux Server for 1 year.', '50 Email address',
    ], '10,000 MB', 20, '1000', '20,000')],
    ['name' => 'UNLIMITED', 'price' => '2,50,000tk / $3000', 'rows' => $dynamicRows('Unlimited pages', 'PHP-CodeIgniter / CMS( WordPress)', [
        'Domain .com .net .org .info Registration.', '10 GB Hosting under Linux Server for 1 year.', '100 Email address',
    ], '20,000 MB', 20, '2000', '20,000')],
];

// "Service For Hosting" policy (VPS / Dedicated hosting pages)
$hostingPolicy = [
    ['title' => '1. Account Setup / Email on file', 'body' => [
        'We will setup your account after we have received payment and we and/or our payment partner(s) have screened the order(s) in case of fraud.',
        'You must provide us with an email address which is not on the domain(s) you are signing up for. This email address will be used for abuse issues or to contact you, so it must be kept up to date.',
        'If you have a domain registered with BASE IT, it is your responsibility to keep the domain contact information correct and up to date. BASE IT is not responsible for a lapsed registration due to outdated contact information.',
        'You may verify or change your information by contacting our sales team by email. Providing false contact information can result in the termination of your account.',
        'For dedicated server purchases or high-risk transactions, a government issued photo ID and possibly a scanned copy of the credit card used may be required. Failure to provide these may result in the order being denied as fraudulent.',
    ]],
    ['title' => 'Ownership', 'body' => [
        'The billing email used for the payment of the account is the authorized owner of the account.',
    ]],
    ['title' => 'Transfers', 'body' => [
        'Our transfers team will make every effort to help you move your site to us. However, transfers are provided as a courtesy service, and we can not make any guarantees regarding the availability, possibility, or time required to complete a transfer. Each hosting company is configured differently, and some hosting platforms save data in an incompatible or proprietary format, which may make it extremely difficult if not impossible to migrate some or all data. We will try our best, but in some cases we may be unable to assist you with a transfer of data from an old host.',
    ]],
    ['title' => 'Dedicated IP Address Allocation', 'body' => [
        'Dedicated IP addresses ordered in addition to the ones included in your package may require IP justification. IP justification rules are set by the American Registry for Internet Numbers (ARIN) and may change. We reserve the right to deny any dedicated IP request based on insufficient justification or current IP usage.',
    ]],
    ['title' => 'Third Party Providers', 'body' => [
        'Any transactions with third parties are solely between you and that provider. BASE IT is not an agent, representative, trustee or fiduciary of the third party provider.',
        'Some products are licensed from third party vendors, and their license terms apply to your use of those products.',
        'Discounts and offers from third party providers may have their own limitations. The terms of the third party provider apply, and you should confirm them with the provider.',
        'BASE IT makes no warranty about, and is not liable for, the quality, availability or timeliness of any third party product or service, and does not guarantee any information provided by third parties.',
    ]],
    ['title' => '2. Content', 'body' => [
        'All services provided by BASE IT may only be used for lawful purposes. The laws of the State of Florida, the State of Texas, and the United States of America apply.',
        'Using a VPS account as a backup / storage device is not permitted, with the exception of one cPanel backup of the same account.',
        'Examples of unacceptable material on all VPS and Reseller servers include:',
    ], 'list' => [
        'Topsites', 'IRC Scripts/Bots', 'Proxy Scripts/Anonymizers', 'Pirated Software/Warez',
        'Image Hosting Scripts (similar to Photobucket or Tinypic)', 'AutoSurf/PTC/PTS/PPC sites', 'IP Scanners',
        'Bruteforce Programs/Scripts/Applications', 'Mail Bombers/Spam Scripts', 'Banner-Ad services (commercial banner ad rotation)',
        'File Dump/Mirror Scripts (similar to rapidshare)', 'Commercial Audio Streaming (more than one or two streams)',
        'Escrow/Bank Debentures', 'High-Yield Interest Programs (HYIP) or Related Sites',
        'Investment Sites (FOREX, E-Gold Exchange, Second Life/Linden Exchange, Ponzi, MLM/Pyramid Scheme)',
        'Sale of any controlled substance without prior proof of appropriate permit(s)', 'Prime Banks Programs',
        'Lottery/Gambling Sites', 'MUDs/RPGs/PBBGs', 'Hacker focused sites/archives/programs',
        'Sites promoting illegal activities', 'Forums and/or websites that distribute or link to warez/pirated/illegal content',
        'Bank Debentures/Bank Debenture Trading Programs',
        'Fraudulent Sites (Including, but not limited to sites listed at aa419.org & escrow-fraud.com)',
        'Push button mail scripts', 'Broadcast or Streaming of Live Sporting Events (UFC, NASCAR, FIFA, NFL, MLB, NBA, WWE, WWF, etc)',
        'Tell A Friend Scripts', 'Anonymous or Bulk SMS Gateways', 'Bitcoin Miners',
        'PayDay Loan Sites (including any site related to PayDay loans, PayDay loan affiliate programs, etc)',
    ]],
];

// Rows of one E-Commerce package column ('# ' = section header row)
$ecomPay2 = [
    '50% advance payment for website development.',
    '50% due payment within 3 days after complete the full project.',
];
$ecomPay3 = [
    '1st time 50% advance payment for website development.',
    '2nd time 30% due payment.',
    '20% due payment after complete the full project within 3 days.',
];
$ecomRows = function ($products, $cats, $pageLine, $menu, $hosting, $traffic, $renew, array $payment) {
    return array_merge([
        '# Website Feature List:',
        'Maximum Product: ' . $products,
        'Max Product Category: ' . $cats,
        $pageLine,
        'Java Script Banner',
        'Menu / POP Up Menu:' . $menu,
        'Shopping Cart.',
        'Shipment option',
        'Order management option.',
        'Auto generated bill.',
        'Clients registration and payment option.',
        '# Domain and Hosting:',
        'Your own Domain gTLD .com .net .org .info Registration',
        $hosting . ' Hosting under Linux Server for one year.',
        'Unlimited Email address',
        $traffic . ' Monthly Data transfer / Traffic.',
        'Unlimited My-Sql Database.',
        'Apache 2.2.x PHP 5.x , Mysql 5.x.',
        'Linux Based Hosting server with FTP and cPanel.',
        'All Other Standard Hosting facilities with Control Panel.',
        '# Terms & Condition:',
        'Development Timelines (If content is available): 45 working days.',
        'If Client Failed to provide the content within 30 days after contract then the project will count as a complete project.',
        'Post-Sales Support: 1 month.',
        'Charges per extra product: 2000 Taka.',
        'Renew: ' . $renew . ' Taka year for Domain & Hosting.',
        'Domain and hosting must be renewing in every year before 1 month of expired date.',
        'Otherwise additional cost will be added according to the domain hosting renew rules.',
        'For Bangladeshi Payment Gateway, cost will be additional 20,000 taka (DBBL, bKash, Qcash,Master/Visa card).',
        'Training Service Free.',
        '# Payment Procedure:',
    ], $payment, [
        'Client must provide all content with work order.',
    ]);
};

return [

    'image_fallback' => 'https://www.baseit.com.bd/wp-content/uploads/',

    'company' => [
        'name'      => 'BASE IT',
        'tagline'   => 'Where IT Solutions Are Created',
        'title'     => 'BASE IT | Best web design and development company in Bangladesh | Software development Company in Bangladesh',
        'meta'      => 'BASE IT - web design & development, software development, e-commerce, domain & hosting registration, email & SMS marketing and SEO company in Dhaka, Bangladesh.',
        'keywords'  => 'web design company bd, software development company in Bangladesh, e-commerce site development Bangladesh, domain hosting Bangladesh, email marketing, sms marketing, SEO Dhaka',
        'logo'      => '2017/02/main-logo.png',
        'address'   => '49, Motijheel, Dhaka-1000, Bangladesh.',
        'email'     => 'info@baseit.com.bd',
        'emails'    => ['info@baseit.com.bd', 'sales@baseit.com.bd', 'support@baseit.com.bd'],
        'phone'     => '02-58051564',
        'hotline'   => '+8801712800947 | +8801720437461',
        'cell'      => '01712800947 | 01720437461',
        'phones'    => [
            'T.N.T'   => '02-58051564',
            'Sales'   => '+8801712800947',
            'Support' => '+8801994340881',
            'Billing' => '+8801720437461',
        ],
        'website'   => 'www.baseit.com.bd',
        'facebook'  => 'https://www.facebook.com/Baseitsloutionsltd/',
        'map'       => 'https://maps.google.com/maps?q=49%20Motijheel%2C%20Dhaka-1000%2C%20Bangladesh&t=&z=15&ie=UTF8&iwloc=&output=embed',
        'apk'       => 'https://www.baseit.com.bd/baseit.apk',
        'copyright' => 'BASE IT 2016',
        'payment_img' => '2017/01/footer-payment2a.png',
    ],

    'bank' => [
        'bank'    => 'Eastern Bank Limited',
        'name'    => 'BASE IT',
        'number'  => '1071070216720',
        'branch'  => 'Mirpur-11, Dhaka-1216, Bangladesh',
        'bkash'   => ['01712800947 (personal)', '01720437461 (personal)'],
    ],

    /* ---------------- Main menu ---------------- */
    'menu' => [
        ['label' => 'Home', 'slug' => '', 'icon' => 'fas fa-home'],
        ['label' => 'About Us', 'slug' => 'about-us'],
        ['label' => 'Website', 'slug' => 'website', 'type' => 'mega', 'children' => [
            ['label' => 'Domain Registration', 'slug' => 'domain-registration', 'img' => 'remote:2016/09/1.png'],
            ['label' => 'VPS Hosting', 'slug' => 'vps-hosting-server', 'img' => 'remote:2016/09/c1.png'],
            ['label' => 'Dedicated Hosting', 'slug' => 'dedicate-hosting-server', 'img' => 'remote:2016/09/8.png'],
            ['label' => 'Web Application', 'slug' => 'web-application', 'img' => 'remote:2016/09/7.png'],
            ['label' => 'Dynamic Website', 'slug' => 'dynamic-website', 'img' => 'remote:2016/09/6.png'],
            ['label' => 'E-commerce', 'slug' => 'e-commerce-development', 'img' => 'cart.png'],
            ['label' => 'News Paper Website', 'slug' => 'news-paper-website', 'img' => 'media.png'],
            ['label' => 'Job Portal', 'slug' => 'job-portal', 'img' => 'job.png'],
            ['label' => 'Mobile Apps', 'slug' => 'mobile-apps', 'img' => 'remote:2016/09/3.png'],
            ['label' => 'Logo Design', 'slug' => 'logo-design', 'img' => 'remote:2016/09/d1.png'],
        ]],
        ['label' => 'Software', 'slug' => 'software', 'type' => 'mega', 'children' => [
            ['label' => 'Inventory Management System', 'slug' => 'inventory-management-system', 'img' => 'indent.png'],
            ['label' => 'Accounting / Finance Management System', 'slug' => 'accounting-finance-management-system', 'img' => 'calculator.png'],
            ['label' => 'Real Estate Management System', 'slug' => 'realestate-management-system', 'img' => 'sign (1).png'],
            ['label' => 'HR Payroll Management System', 'slug' => 'hr-payroll-management-system', 'img' => 'briefcase.png'],
            ['label' => 'Garments ERP Management System', 'slug' => 'garments-erp', 'img' => 'database.png'],
            ['label' => 'Hospital Management System', 'slug' => 'hospital-management-system', 'img' => 'hospital (1).png'],
            ['label' => 'Asset / Rent Management System', 'slug' => 'rent-management-system', 'img' => 'renren-social-network-of-china-logotype.png'],
            ['label' => 'Tours & Travel Management Software', 'slug' => 'travel-tours-management-system', 'img' => 'paper-plane.png'],
            ['label' => 'School / College Management System', 'slug' => 'school-college-management-software', 'img' => 'graduate-hat.png'],
            ['label' => 'Multi Level Marketing (MLM) Software', 'slug' => 'mlm-system', 'img' => 'sitemap.png'],
        ]],
        ['label' => 'Clients', 'slug' => 'clients'],
        ['label' => 'Online Marketing', 'slug' => 'online-marketing', 'type' => 'mega3', 'children' => [
            ['label' => 'Email Marketing', 'slug' => 'email-marketing', 'img' => 'envelope.png'],
            ['label' => 'SMS Marketing', 'slug' => 'sms-marketing', 'img' => 'bubble-chat.png'],
            ['label' => 'Search Engine Optimization (SEO)', 'slug' => 'search-engine-optimization', 'img' => 'search.png'],
        ]],
        ['label' => 'Training', 'slug' => 'training', 'type' => 'list', 'children' => [
            ['label' => 'Web Development', 'slug' => 'web-design-development-training'],
            ['label' => 'WordPress', 'slug' => 'wordpress-training'],
            ['label' => 'Raw PHP & CodeIgniter', 'slug' => 'php-codeigniter-training'],
        ]],
        ['label' => 'Payment', 'slug' => 'payment-method'],
        ['label' => 'Career', 'slug' => 'find-a-job'],
        ['label' => 'Contact', 'slug' => 'contact-us'],
    ],

    /* ---------------- Home page ---------------- */
    // Home hero slider: odd slides = image left / text right, even slides = text left / image right
    'slides' => [
        [
            'img'   => 'revslider/baseintro/Web-Design-Base-IT.jpg',
            'tag'   => 'Web Solutions',
            'title' => 'Website Design & Development',
            'text'  => 'Our expertise is understanding our clients\' goals and building dynamic, database-driven websites or e-commerce sites that grow their business.',
            'slug'  => 'dynamic-website',
        ],
        [
            'img'   => 'revslider/baseintro/Domain-Hosting-Base-IT.jpg',
            'tag'   => 'Domain & Hosting',
            'title' => 'Domain & Hosting Registration',
            'text'  => 'Register your .com, .net, .org, .info, .biz, .us, .name domain at only Tk. 1200/ per year. There are no fees!',
            'slug'  => 'domain-registration',
        ],
        [
            'img'   => 'revslider/baseintro/SMS-Email-Marketing-Base-IT.jpg',
            'tag'   => 'Digital Marketing',
            'title' => 'SMS & Email Marketing',
            'text'  => 'Mobile phone is the most popular technology of our daily life. This technology has become the main communication media. SMS is such a messaging service which may create instant response through mobile phone.',
            'slug'  => 'online-marketing',
        ],
        [
            'img'   => 'revslider/baseintro/Software-Development-Base-IT.jpg',
            'tag'   => 'Custom Software',
            'title' => 'Software Development',
            'text'  => 'Award-winning development teams available on short notice, with a proven development process from idea to delivery.',
            'slug'  => 'software',
        ],
    ],

    'services' => [
        ['icon' => 'fas fa-desktop', 'title' => 'WEB DESIGN', 'sub' => 'AND DEVELOPMENT', 'slug' => 'dynamic-website',
         'text' => 'Our creative web designers can develop innovative and customized website with most affordable price in Bangladesh. HTML5 or CSS3 you name it we know it.'],
        ['icon' => 'fas fa-cogs', 'title' => 'SOFTWARE', 'sub' => 'DEVELOPMENT', 'slug' => 'software',
         'text' => 'Your dream of developing software can come true with our skilled & Experienced software engineers & programmers. Convert your ideas into reality.'],
        ['icon' => 'fas fa-search', 'title' => 'SEARCH ENGINE', 'sub' => 'OPTIMIZATION', 'slug' => 'search-engine-optimization',
         'text' => 'Our Search Engine Optimization experts can help you to improve your website\'s search rankings. Increase your website visitors and profit.'],
        ['icon' => 'fas fa-mobile-alt', 'title' => 'MOBILE', 'sub' => 'APP DEVELOPMENT', 'slug' => 'mobile-apps',
         'text' => 'BASE IT offers affordable end-to-end iPhone, iPad, Android Application Development services. Demand of Mobile Application is rising.'],
        ['icon' => 'fas fa-upload', 'title' => 'WEB', 'sub' => 'HOSTING', 'slug' => 'vps-hosting-server',
         'text' => 'With 99.9% uptime & 30 days money back guarantee we offer affordable web hosting services in Bangladesh. Lightning Fast hosting server from USA.'],
        ['icon' => 'fas fa-globe-americas', 'title' => 'DOMAIN NAME', 'sub' => 'REGISTRATION', 'slug' => 'domain-registration',
         'text' => 'Now you can own not only .com but also .net, .info, .biz, .org as well as .com.bd, .net.bd and many other TLDs. Cheapest domain registrar in Bangladesh.'],
        ['icon' => 'fas fa-shopping-cart', 'title' => 'ECOMMERCE', 'sub' => 'WEBSITES', 'slug' => 'e-commerce-development',
         'text' => 'Let our professional eCommerce website designers develop a customized user-friendly online store for you. Make money selling your products online.'],
        ['icon' => 'fas fa-link', 'title' => 'ONLINE MARKETING', 'sub' => 'SOLUTIONS', 'slug' => 'online-marketing',
         'text' => 'Want huge online exposures! Let us do the SMS, eMail or Social Media Marketing and Advertising for you. Reach to thousands of new customers.'],
    ],

    'featured_software' => [
        ['icon' => 'fa-solid fa-heart-pulse', 'title' => 'Hospital Management System (ERP)', 'slug' => 'hospital-management-system',
         'text' => 'Helps in faster clinical assessment and administrative handling of patients.'],
        ['icon' => 'fa-solid fa-calculator', 'title' => 'Accounting / Financial Accounting Management System', 'slug' => 'accounting-finance-management-system',
         'text' => 'Accounting software describes a type of application software that records and processes accounting transactions.'],
        ['icon' => 'fa-solid fa-building', 'title' => 'Rent Management System', 'slug' => 'rent-management-system',
         'text' => 'Rent Manager is a powerful property management software tool that combines tenants, rent and accounts.'],
        ['icon' => 'fa-solid fa-boxes-stacked', 'title' => 'Inventory Management System', 'slug' => 'inventory-management-system',
         'text' => 'Our Inventory is an online application that enables multi-channel selling, shipping and stock control.'],
        ['icon' => 'fa-solid fa-briefcase', 'title' => 'HR & Payroll Management System', 'slug' => 'hr-payroll-management-system',
         'text' => 'A payroll system is software which organizes all the tasks of employee payment and attendance.'],
        ['icon' => 'fa-solid fa-school', 'title' => 'School Management System', 'slug' => 'school-college-management-software',
         'text' => 'School management software built on open source platform. ERP for Schools and Colleges.'],
    ],

    'trust' => [
        ['icon' => 'fa-solid fa-display', 'title' => 'Qualified Members',
         'text' => 'Our young and experienced Professionals are here to provide utmost return on your investment in shortest possible time with their talent and proficiency.'],
        ['icon' => 'fa-regular fa-eye', 'title' => 'Project Deliver in time',
         'text' => 'We always keep our schedule clean. That is why we can deliver our projects in time without compromising quality.'],
        ['icon' => 'fa-solid fa-briefcase', 'title' => 'Our Company Strategy',
         'text' => 'There are thousands of companies and competition is still there. But our only strategy is to make our clients happy.'],
    ],

    // Home: 4 white cards beside "Our Skill Metrix" (order = left-to-right, top-to-bottom)
    'stats' => [
        ['label' => 'Customers', 'value' => 2480, 'icon' => 'fas fa-users'],
        ['label' => 'Traffic', 'value' => 5986, 'icon' => 'fas fa-umbrella'],
        ['label' => 'Hits per day', 'value' => 250, 'icon' => 'fas fa-mug-saucer'],
        ['label' => 'Total projects', 'value' => 3480, 'icon' => 'far fa-clock'],
    ],

    // Right sidebar on software pages ("Our Software Package"); slug null = no page yet (goes to contact)
    'software_sidebar' => [
        ['label' => 'Hospital Management System', 'slug' => 'hospital-management-system', 'icon' => 'fas fa-hospital'],
        ['label' => 'Inventory Management System', 'slug' => 'inventory-management-system', 'icon' => 'fas fa-boxes-stacked'],
        ['label' => 'Accounting / Finance Software', 'slug' => 'accounting-finance-management-system', 'icon' => 'fas fa-calculator'],
        ['label' => 'HR/Payroll Management System', 'slug' => 'hr-payroll-management-system', 'icon' => 'fas fa-id-card'],
        ['label' => 'Asset/Rent Management System', 'slug' => 'rent-management-system', 'icon' => 'fas fa-building'],
        ['label' => 'School / College Software', 'slug' => 'school-college-management-software', 'icon' => 'fas fa-graduation-cap'],
        ['label' => 'Real Estate Management System', 'slug' => 'realestate-management-system', 'icon' => 'fas fa-house'],
        ['label' => 'POS Software', 'slug' => null, 'icon' => 'fas fa-cash-register'],
        ['label' => 'Travel & Tours Man. System', 'slug' => 'travel-tours-management-system', 'icon' => 'fas fa-plane'],
        ['label' => 'MLM Software', 'slug' => 'mlm-system', 'icon' => 'fas fa-sitemap'],
        ['label' => 'Courier Management System', 'slug' => null, 'icon' => 'fas fa-truck'],
    ],

    // "Checkout Some Statistics" circles (percent = how much of the circle is cyan)
    'customer_stats' => [
        ['label' => 'Customers', 'value' => 2480, 'percent' => 83],
        ['label' => 'Website Customers', 'value' => 1800, 'percent' => 50],
        ['label' => 'Software Customers', 'value' => 350, 'percent' => 62],
        ['label' => 'Online Marketing', 'value' => 330, 'percent' => 66],
    ],

    'skills' => [
        ['label' => 'Web Development', 'value' => 90, 'class' => 'fill-green'],
        ['label' => 'Software Development', 'value' => 80, 'class' => 'fill-blue'],
        ['label' => 'Online Marketing', 'value' => 70, 'class' => 'fill-yellow'],
        ['label' => 'ERP Development', 'value' => 65, 'class' => 'fill-red'],
    ],

    'testimonials' => [
        ['name' => 'Lion Mirza Abdul Khaleque', 'role' => 'Chariman, Lion Group', 'img' => 'welcome/images/baseitclient.jpg.png',
         'text' => '<b>BASE IT</b> has provided us asset management system.They have very talented, knowledgeable and creative software engineer. So, I recommend <b>BASE IT</b> for any kind of business automation.'],
        ['name' => 'Prof. Manzoor Hussain', 'role' => 'Director, Dhaka Shishu Hospital', 'img' => 'welcome/images/baseitclient04.png',
         'text' => 'We are very glad that <b>BASE IT</b> has provided the best Web development service for Dhaka Shishu Hospital. We are very thankful for their such corporate services towards us.'],
        ['name' => 'Abu Samaun Sardar', 'role' => 'President, Getup USA Incorporation', 'img' => 'welcome/images/baseitclient03.jpg',
         'text' => 'We can reach our customers globally in the international market through Ecommerce site that was delivered by <b>BASE IT</b>. We are 100% satisfied with their corporate services.'],
    ],

    'client_logos' => [
        '2015/04/1az.png', '2015/04/hnlogo.png', '2015/04/Lyric-lOGO-2a1.png',
        '2015/04/Untitledrrr-1.png', '2015/04/wasa_logo.png', '2015/04/reliance-insurance-limited-.png',
        '2015/04/zaaralogo21.png', '2015/04/palli-logo1.png', '2017/02/main-logo.png',
    ],

    // [name, short text, logo (wp uploads path)]
    'clients' => [
        ['Lion Group', 'Lion Group', '2016/11/1az.png'],
        ['LYRIC GROUP', 'Lyric Group since 1993', '2016/12/Lyric-lOGO-2a1.png'],
        ['DHA. SHISHU HOS.', 'Dhaka Shishu Hospital', '2016/12/Untitledrrr-1.png'],
        ['ZAARA', 'A House of fashion', '2016/12/26a.png'],
        ['Palli Boutiques', 'Ecommerce site', '2016/12/21a.png'],
        ['HANNAN GROUP', 'Since 1998', '2016/11/2az.png'],
        ['Safe Air Travels', 'Travel Agency', '2016/11/8az.png'],
        ['Red Spider', 'Red Spider Buying', '2016/12/5az.png'],
        ['WASA', 'WASA Software', '2016/11/3az.png'],
        ['DEW', 'Dhaka Eng. Works', '2016/11/4az.png'],
        ['4 Site', '4 Site Intl. Ltd.', '2016/12/6az.png'],
        ['PCS BD', 'PCS Corporation', '2016/12/10az-1.png'],
        ['BSPID', 'Pediatric Hope', '2016/12/16a.png'],
        ['Getup Global', 'Buying Sourcing Ltd.', '2016/12/17a.png'],
        ['Triple F', 'Triple F', '2016/12/18a.png'],
        ['RSL', 'Ritzy Style Ltd.', '2016/12/24a.png'],
        ['UMT', 'UMT Shipping', '2016/12/20a.png'],
        ['AIR LINK', 'Air Link Overseas', '2016/12/19a.png'],
    ],

    // Clients page A–Z directory (letter is taken from the first character; digits go under 0-9)
    'client_directory' => [
        'Asia Sourcing Ltd.', 'ASO Dream Sourcing Ltd.', 'Al-Madina Development Co.Ltd.', 'Air link Overseas', 'Amana Group',
        'Amtuk Bangladesh Ltd.', 'Alphazone Bangladesh Ltd.', 'Ambition Group', 'Alif Ambulance Service Ltd.', 'A.G.Church School/Dhaka',
        'Bangla Tours & Travels Ltd.', 'Bangladesh Society for Paediatric Infectious Disease', 'Bangladesh Fresh Fruits Importer Association',
        'BKS and associates Ltd.', 'Bangla 52 News', 'Bangla Group', 'Bengal Refrigeration Co.Ltd.', 'BL Machineries Ltd.',
        'Bay Air International Ltd.', 'Bangladesh German Chamber of Commerce & Industry',
        'Chemist Laboratories Ltd.', 'Chemist Food & Consumers Ltd.', 'Chemist Herbal Care & Nutraceuticals Ltd.', 'Chemist Crop Care Ltd.',
        'Chemist Agro Bio Tech Ltd.', 'Chemist Laboratories Ltd.(Animal)', 'Coma Creation Ltd.', 'Children Heart Foundation & Research, Dhaka',
        'Consort International Ltd.', 'CS Care Ltd.', 'Cathweld Construction Co. Ltd.', 'Chhekapora Resturent Ltd.', 'Cover Accessories Ltd.',
        'Dhaka Shishu (Children) Hospital', 'Dhaka Engineering Works Ltd.', 'Dot Design Ltd.', 'Dr. Biru', 'Dream Tex Bangladesh',
        'Dhaka Guard Security pvt. Ltd.',
        'East West International School & College', 'Esha Poribesh Shohayok Nursery',
        'Farzana Machineries Co. Ltd.', 'FR Montu Associates Law firm.', 'Fancy Fashion Ltd.', 'FM Method',
        'F.M. International School & College', 'Friends Trading Arms Company',
        'Global Group', 'Go Whole sale Bangladesh', 'Guideline Holidays', 'Get-UP Global', 'Golden Benarashi', 'GPQ PC Bangladesh',
        'Hannan Group', 'Heart Beat Corporation', 'Harvey Ellis', 'Homes Solution Interior',
        'Idea Tours Bangladesh', 'IFTAR FOOD', 'Imagine Production', 'Imagine Stocks',
        'J-MAAK/Australia', 'Janani Rent A Car', 'Jeny SH Pvt. Ltd.',
        'Lyric Industries Pvt. Ltd.', 'Lion Group', 'Luminous International',
        'Masala Express Bangladesh', 'May Fair Beauty Parlour', 'Mens World Ltd.', 'Mind Touch Bangladesh',
        'Mother International Bangladesh', 'Mulen Bangladesh', 'Maak Bangladesh', 'MK Hossain International', 'Mashri Quee Textile Ltd.',
        '4site International Limited',
    ],
    'jobs' => [
        // 'text' = paragraphs shown when the job is opened on the Find a Job page
        ['title' => 'Officer / Sr. Officer (Sales & Marketing)', 'text' => [
            'BASE IT is looking for some expert & energetic person for selling & marketing sector .',
            'We are giving the opportunity for fresher & Experienced person as a officer / Sr. Officer (Sales & Marketing).',
            'Drop your CV here and find your desire job as early as possible.',
        ]],
        ['title' => 'Web Developer / Sr. Web Developer', 'text' => [
            'BASE IT is looking for some expert & energetic person for web development sector .',
            'We are giving the opportunity for fresher & Experienced person as a Web Developer / Sr. Web Developer.',
            'Drop your CV here and find your desire job as early as possible.',
        ]],
        ['title' => 'Software Engineer / Sr. Software Engineer', 'text' => [
            'BASE IT is looking for some expert & energetic person for software development sector .',
            'We are giving the opportunity for fresher & Experienced person as a Software Engineer / Sr. Software Engineer.',
            'Drop your CV here and find your desire job as early as possible.',
        ]],
    ],

    /* ---------------- Inner pages ---------------- */
    'pages' => [

        'about-us' => [
            'title' => 'About Us', 'subtitle' => 'All about our company',
            'classic' => true,
            'blocks' => [
                ['type' => 'about_stats', 'items' => [
                    ['icon' => 'fas fa-users', 'value' => 2480, 'label' => 'Customers',
                     'text' => 'We build long relationships with our clients. About 20 thousand registered users are happy with our support and come back to us for their future projects.'],
                    ['icon' => 'fas fa-briefcase', 'value' => 3480, 'label' => 'Completed Projects',
                     'text' => 'Our clients are our marketers because of the quality of our work. The total number of completed projects proves our capability.'],
                    ['icon' => 'fas fa-chart-line', 'value' => 5986, 'label' => 'Traffic',
                     'text' => 'Client satisfaction brings us traffic. About 20 thousand registered users are happy with our support and come back for future projects.'],
                ]],
                ['type' => 'about_what', 'title' => 'What', 'highlight' => 'We are ?',
                 'body' => 'Base IT is a leading IT firm in Bangladesh. Our aspiration is to produce high quality, cost effective, reliable, results-oriented web and e-commerce solutions on time. Our young and experienced Professionals are here to provide utmost return on your investment in shortest possible time with their talent and proficiency. Our company develops distinctive web solutions which give our clients a competitive advantage and improved effectiveness for their end users.',
                 'skills' => [
                    ['label' => 'Wordpress', 'value' => 90, 'class' => 'fill-blue'],
                    ['label' => 'Joomla', 'value' => 75, 'class' => 'fill-yellow'],
                    ['label' => 'Drupal', 'value' => 80, 'class' => 'fill-green'],
                    ['label' => 'Magento', 'value' => 83, 'class' => 'fill-red'],
                 ]],
                ['type' => 'heading', 'small' => 'Our Team', 'before' => 'More About', 'highlight' => 'Our Members', 'rest' => ''],
                ['type' => 'team', 'members' => [
                    ['name' => 'Engr. Md. Sharif Uddin (Joy)', 'role' => 'Managing Director', 'img' => 'welcome/baseit/team-sharif.jpg'],
                    ['name' => 'Asadullah Bukhari (Sabbir)', 'role' => 'Executive Director', 'img' => 'welcome/baseit/team-sabbir.jpg'],
                ]],
                ['type' => 'about_tabs', 'tabs' => [
                    ['label' => 'OUR MISSION', 'icon' => 'fas fa-bullseye', 'bg' => 'welcome/baseit/about-city.jpg', 'img' => 'welcome/baseit/stats-bg.jpg',
                     'text' => 'Base IT is a leading IT firm in Bangladesh. Our aspiration is to produce high quality, cost effective, reliable, results-oriented web and e-commerce solutions on time. Our young and experienced Professionals are here to provide utmost return on your investment in shortest possible time with their talent and proficiency. Our company develops distinctive web solutions which give our clients a competitive advantage.'],
                    ['label' => 'OUR VISION', 'icon' => 'fas fa-eye', 'bg' => 'welcome/baseit/stats-bg.jpg', 'img' => 'welcome/baseit/about-city.jpg',
                     'text' => 'Base IT is a leading IT firm in Bangladesh. Our aspiration is to produce high quality, cost effective, reliable, results-oriented web and e-commerce solutions on time. Our young and experienced Professionals are here to provide utmost return on your investment in shortest possible time with their talent and proficiency. Our company develops distinctive web solutions which give our clients a competitive advantage.'],
                ]],
                ['type' => 'about_why', 'title' => 'Why Choose', 'highlight' => 'us ?',
                 'body' => [
                    'Base IT has been providing Web Design, Web Development, SEO and Domain Hosting services for over 8 years. We are a pioneer in IT outsourcing in Bangladesh, proudly representing Bangladesh in the international market. Base IT started its journey in 2007 in Dhaka, Bangladesh, with a team of 40+ experienced web designers, developers and SEO experts.',
                    'Today Base IT offers a wide range of online services including Customized Website Development, Web Hosting, Search Engine Optimization, E-Commerce Websites, Internet Marketing, Mobile and Web Applications and Custom Software Development. We are your end-to-end partner who listens, guides and helps you reach your online goals. We serve more than 1000 clients in 15 countries.',
                    'We are one of the most respected IT companies in Bangladesh, offering creative solutions at very affordable prices. "Quality And Affordable Price" is the trademark of our services.',
                 ],
                 'services_title' => 'Our Services',
                 'services' => [
                    ['title' => 'Domain Registration', 'slug' => 'domain-registration', 'text' => 'Get your own .com, .net, .org, .info, .biz, .us, .name Domain for just Yearly Tk. 1200/. There are no fees! A domain name is your unique name on the Internet.'],
                    ['title' => 'VPS Hosting', 'slug' => 'vps-hosting-server', 'text' => 'Hosting is meant for clients that are seeking single or multiple domain hosting under one business hosting plan and one control panel.'],
                    ['title' => 'Dedicated Hosting', 'slug' => 'dedicate-hosting-server', 'text' => 'Hosting is meant for clients that are seeking single or multiple domain hosting under one business hosting plan and one control panel.'],
                    ['title' => 'Web Application', 'slug' => 'web-application', 'text' => 'When your business outgrows the functionalities that a simple static web site can offer, you need a more complex dynamic web site that is capable to interact with your clients or viewers.'],
                    ['title' => 'E-Commerce Development', 'slug' => 'e-commerce-development', 'text' => 'Base IT is a leading IT company for e-commerce development (online shopping carts and web stores), search engine optimization and internet marketing, working in the e-commerce sector for about 5 years.'],
                    ['title' => 'News Paper Website', 'slug' => 'news-paper-website', 'text' => 'Find your website in both package Standard & Professional package.'],
                    ['title' => 'Job Portal', 'slug' => 'job-portal', 'text' => 'When your business outgrows the functionalities that a simple static web site can offer.'],
                    ['title' => 'Mobile Apps', 'slug' => 'mobile-apps', 'text' => 'BASE IT is one of the oldest and most affordable mobile application developing companies in Bangladesh.'],
                    ['title' => 'Logo Design', 'slug' => 'logo-design', 'text' => 'BASE IT is one of the oldest and most affordable logo design companies in Bangladesh.'],
                 ]],
            ],
        ],

        /* ----- Website ----- */
        'website' => [
            'title' => 'Website', 'subtitle' => 'All About Website',
            'classic' => true,
            'blocks' => [
                ['type' => 'heading', 'small' => 'Domain Registration', 'highlight' => 'Register or Renew', 'rest' => 'your Domain here.'],
                ['type' => 'media', 'img' => 'welcome/baseit/domain-registration.jpg', 'art' => 'domains', 'cols' => 'minmax(0, 44fr) minmax(0, 56fr)',
                 'button' => ['label' => 'Read More', 'slug' => 'domain-registration'], 'body' => [
                    'Get your own .com, .net, .org, .info, .biz, .us, .name, Domain you can register or renew a domain name for just Yearly Tk. 1200/. There are no fees! A domain name is your unique name on the Internet. It allows your company, organization or family to establish an Internet presence, consisting of your personalized email addresses and your own web site address.',
                ]],
                ['type' => 'heading', 'small' => 'VPS Hosting Server', 'highlight' => '', 'rest' => 'We provide the best hosting space'],
                ['type' => 'media', 'img' => 'welcome/baseit/vps-hosting.jpg', 'art' => 'server', 'cols' => 'minmax(0, 44fr) minmax(0, 56fr)',
                 'button' => ['label' => 'Read More', 'slug' => 'vps-hosting-server'], 'body' => [
                    'Hosting is meant for clients who are looking to host one or multiple domains under one business plan and one control panel. Our business hosting is fully managed, so we are always here to help you with any issues you may have.',
                    'Call us, email us, or chat with us through Live Chat. We are always there and always happy to help you with anything you need.',
                ]],
                ['type' => 'heading', 'small' => 'Dynamic Website', 'highlight' => 'Build Your Dynamic website', 'rest' => 'in Cheap rate'],
                ['type' => 'media', 'img' => 'welcome/baseit/dynamic-website.png', 'art' => 'web', 'cols' => 'minmax(0, 38fr) minmax(0, 62fr)', 'body' => $dynamicIntro],
                ['type' => 'pricing', 'items' => $dynamicPackages],
            ],
        ],

        'domain-registration' => [
            'title' => 'Domain Registration', 'subtitle' => 'Get your own domain name', 'parent' => 'website',
            'classic' => true,
            'blocks' => [
                ['type' => 'heading', 'small' => 'Domain Registration', 'highlight' => 'Register or Renew', 'rest' => 'your Domain here.'],
                ['type' => 'media', 'img' => 'welcome/baseit/domain-registration.jpg', 'art' => 'domains', 'body' => [
                    'Get your own .com, .net, .org, .info, .biz, .us, .name, Domain you can register or renew a domain name for just Yearly Tk. 1200/. There are no fees! A domain name is your unique name on the Internet. It allows your company, organization or family to establish an Internet presence, consisting of your personalized email addresses and your own web site address.',
                ]],
                ['type' => 'domain', 'style' => 'classic'],
                ['type' => 'table', 'style' => 'classic', 'label' => 'Domain Registration Package:', 'head' => ['TLD', 'Min.Years', 'Register', 'Transfer', 'Renew'], 'rows' => [
                    ['.com', '1', 'Tk.1200.00 / $15', 'Tk.5000.00 / $65', 'Tk.1200.00 / $15'],
                    ['.net', '1', 'Tk.1200.00 / $15', 'Tk.5000.00 / $65', 'Tk.1200.00 / $15'],
                    ['.org', '1', 'Tk.1200.00 / $15', 'Tk.5000.00 / $65', 'Tk.1200.00 / $15'],
                    ['.info', '1', 'Tk.1200.00 / $15', 'Tk.5000.00 / $65', 'Tk.1200.00 / $15'],
                    ['.biz', '1', 'Tk.1200.00 / $15', 'Tk.5000.00 / $65', 'Tk.1200.00 / $15'],
                    ['.com.bd/.net.bd', '2', 'Tk.5000.00 / $65', 'Tk.5000.00 / $65', 'Tk.5000.00 / $65'],
                ]],
                ['type' => 'bullets', 'title' => 'Included (free) in each domain name registration:', 'items' => [
                    'Free URL forwarding to the current website',
                    'Free e-mail forwarding to your current mailbox',
                    'Free POP3-mailbox (for use with email clients like Outlook etc)',
                    'Free DNS services (self-install of A/MX/CNAME records)',
                    'Free link to the current hosting package',
                ]],
                ['type' => 'bullets', 'title' => 'Terms & Condition:', 'items' => [
                    'Client must renew the domain & hosting before 1 month of expired date.',
                    'If Client Failed to renew before one month then additional 2000 taka will add with renew charge',
                    'If client want to renew after expired date then additional 8000 taka will add with renew charge',
                    'If client failed to renew within 1 month of expired date then the domain will permanently block and BASE IT will not take any responsibility to renew the domain',
                    'Domain Control Panel / Transfer Cost is: 5000 taka',
                ]],
            ],
        ],

        'vps-hosting-server' => [
            'title' => 'VPS Hosting Server', 'subtitle' => 'Trusted Hosting Server', 'parent' => 'website',
            'classic' => true,
            'blocks' => [
                ['type' => 'heading', 'small' => 'VPS Hosting Server', 'highlight' => '', 'rest' => 'We provide the best hosting space'],
                ['type' => 'media', 'img' => 'welcome/baseit/vps-hosting.jpg', 'art' => 'server', 'cols' => 'minmax(0, 32fr) minmax(0, 68fr)', 'body' => [
                    'Hosting is meant for clients who are looking to host one or multiple domains under one business plan and one control panel. Our business hosting is fully managed, so we are always here to help you with any issues you may have.',
                    'Call us, email us, or chat with us through Live Chat. We are always there and always happy to help you with anything you need.',
                ]],
                ['type' => 'table', 'style' => 'classic', 'order' => 'Order Now', 'label' => 'Hosting Server Package:', 'head' => ['Hosting Space / (VPS Server)', 'Price / Year', 'To Buy'], 'rows' => [
                    ['500 MB', 'Tk. 3,000 / $37.5'],
                    ['1 GB', 'Tk. 5,000 / $62.5'],
                    ['2 GB', 'Tk. 10,000 / $125'],
                    ['3 GB', 'Tk. 15,000 / $187.5'],
                    ['5 GB', 'Tk. 23,000 / $287.5'],
                    ['10 GB', 'Tk. 40,000 / $500'],
                ]],
                ['type' => 'policy', 'title' => 'Service For Hosting', 'sections' => $hostingPolicy],
            ],
        ],

        'dedicate-hosting-server' => [
            'title' => 'Hosting Server', 'subtitle' => 'Trusted Hosting Server', 'parent' => 'website',
            'classic' => true,
            'blocks' => [
                ['type' => 'heading', 'small' => 'Hosting Server', 'highlight' => '', 'rest' => 'We provide the best hosting space'],
                ['type' => 'media', 'img' => 'welcome/baseit/dedicated-hosting.jpg', 'art' => 'server', 'cols' => 'minmax(0, 32fr) minmax(0, 68fr)', 'body' => [
                    'Hosting is meant for clients who are looking to host one or multiple domains under one business plan and one control panel. Our business hosting is fully managed, so we are always here to help you with any issues you may have. We provide the best dedicated hosting server with high performance.',
                    'Call us, email us, or chat with us through Live Chat. We are always there and always happy to help you with anything you need.',
                ]],
                ['type' => 'table', 'style' => 'classic', 'order' => 'Order Now', 'label' => 'Hosting Server Package:', 'head' => ['Hosting Space / (Dedicated Server)', 'Taka / Year', 'To Buy'], 'rows' => [
                    ['500 MB', '5,000'],
                    ['1 GB', '9,000'],
                    ['2 GB', '16,000'],
                    ['3 GB', '23,000'],
                    ['5 GB', '35,000'],
                    ['10 GB', '60,000'],
                ]],
                ['type' => 'policy', 'title' => 'Service For Hosting', 'sections' => $hostingPolicy],
            ],
        ],

        'web-application' => [
            'title' => 'Web Application', 'subtitle' => 'Custom web applications for your business.', 'parent' => 'website',
            'blocks' => [
                ['type' => 'text', 'body' => $dynamicIntro],
                ['type' => 'cta', 'text' => 'Tell us about your idea and get a free quotation.'],
            ],
        ],

        'dynamic-website' => [
            'title' => 'Dynamic Website', 'subtitle' => 'Smart Dynamic Website in Cheap Rate', 'parent' => 'website',
            'classic' => true,
            'blocks' => [
                ['type' => 'heading', 'small' => 'Dynamic Website', 'highlight' => 'Build Your Dynamic website', 'rest' => 'in Cheap rate'],
                ['type' => 'media', 'img' => 'welcome/baseit/dynamic-website.png', 'art' => 'web', 'cols' => 'minmax(0, 38fr) minmax(0, 62fr)', 'body' => $dynamicIntro],
                ['type' => 'pricing', 'items' => $dynamicPackages],
            ],
        ],

        'e-commerce-development' => [
            'title' => 'E-Commerce Development', 'subtitle' => 'Start your E-commerce business now', 'parent' => 'website',
            'classic' => true,
            'blocks' => [
                ['type' => 'heading', 'small' => 'E-Commerce Development', 'highlight' => 'World Class E-commerce site', 'rest' => 'in Cheap rate'],
                ['type' => 'para', 'body' => [
                    'BASE IT is a leading IT company in Bangladesh for e-commerce development (online shopping carts and web stores), search engine optimization and internet marketing. We have been working in the e-commerce sector for about 5 years.',
                ]],
                ['type' => 'media', 'img' => 'welcome/baseit/ecommerce-development.png', 'art' => 'cart', 'cols' => 'minmax(0, 36fr) minmax(0, 64fr)', 'body' => [
                    'We mainly work with our own custom platform and tools. We have delivered many projects that brought strong growth to our clients. We work closely with our clients to discuss their requirements, and we believe in mutual growth and on-time delivery.',
                    'A custom e-commerce website is a complete package to sell your products, track your customers, process transactions and keep records. It includes shopping cart, product catalog, APIs and online payment integration. We offer both standard and professional designs to fit different budgets.',
                ]],
                ['type' => 'para', 'body' => [
                    'A good e-commerce solution makes your website attractive, user-friendly and easy to manage through a CMS. The benefits of our e-commerce packages include:',
                ]],
                ['type' => 'pricing', 'items' => [
                    ['name' => 'CHERRY', 'price' => '50000TK / $625', 'rows' => $ecomRows('50', '6', 'Maximum Dynamic Page: 15', '15', '1000 MB', '10000 MB', '10,000', $ecomPay2)],
                    ['name' => 'MANGO', 'price' => '75000TK / $938', 'badge' => 'Most Popular', 'rows' => $ecomRows('100', '10', 'Maximum Dynamic Page: 20', ' 25', '1000 MB', '10000 MB', '20,000', $ecomPay3)],
                    ['name' => 'PINEAPPLE', 'price' => '100000TK / $1250', 'rows' => $ecomRows('Unlimited', 'Unlimited', 'Dynamic Page: Unlimited', ' Unlimited', '2000 MB', '10000 MB', '20,000', $ecomPay2)],
                    ['name' => 'UNLIMITED', 'price' => '150000TK / $1875', 'rows' => $ecomRows('Unlimited', 'Unlimited', 'Dynamic Page: Unlimited', ' Unlimited', '5000 MB', '50000 MB', '25,000', $ecomPay2)],
                ]],
            ],
        ],

        'news-paper-website' => [
            'title' => 'Online Newspaper Website', 'subtitle' => 'All About Online Newspaper Website', 'parent' => 'website',
            'classic' => true,
            'blocks' => [
                ['type' => 'heading', 'small' => 'News Paper Website', 'highlight' => 'Find your Website', 'rest' => 'in Cheap rate'],
                ['type' => 'pricing', 'width' => 920, 'items' => [
                    ['name' => 'Standard Package', 'price' => '70,000TK / $875', 'rows' => [
                        'Free **.com/.net/.org** domain', 'Free **1000 MB** Hosting', '**10** Email address',
                        'Number of Page : **50**', 'Design Concept sample:**08**', 'Royalty-Free Images:**100**',
                        'CMS Script:**WordPress**', 'Dual Language: **English/Bengali**', 'Content page size: **A4 size**',
                        'Flash Banner: **5 picture**', 'Menu / POP Up Menu: **20**', 'Development Timelines : **20 working days**',
                        'Renew Fee(Yearly): **11,000 Taka / $138**',
                    ]],
                    ['name' => 'Professional Package', 'price' => '1,50,000TK / $1875', 'rows' => [
                        'Free **.com/.net/.org** domain', 'Free **2000 MB** Hosting', '**20** Email address',
                        'Number of Page : **80**', 'Design Concept sample:**10**', 'Royalty-Free Images:**100**',
                        'CMS Script:**WordPress**', 'Dual Language: **English , Bengali**', 'Content page size: **A4 size**',
                        'Flash Banner: **10 picture**', 'Menu / POP Up Menu: **30**', 'Development Timelines : **30 working days**',
                        'Renew Fee(Yearly): **21,000 Taka / $263**',
                    ]],
                ]],
                ['type' => 'bullets', 'size' => 'lg', 'title' => 'Individual Web Module Price:', 'items' => [
                    'Online Feedback Form: 2000 taka / $25',
                    'Visitor Counter: 1000 taka/$150',
                    'Language Module(Without Bangla): 2000 taka / $25, Bangla – 1000 taka per page/$15',
                    'Every A4 size Content: 1500 taka / $20',
                    'Extra Royalty Free Image: 100 taka per image / $1.5',
                    'Extra scanned image: 20 taka per image / $0.3',
                    'Editing Image: 50 taka per image / $0.7',
                    'Flash Intro: 5000 taka / $70',
                    'Flash banner: 2000 taka / $25',
                    'Music: 2000 taka / $25',
                    'Weather: 3000 taka / $40',
                    'Google Map: 2000 taka / $25',
                ]],
                ['type' => 'bullets', 'size' => 'lg', 'title' => 'Support Charge (Within 48 hour support):', 'items' => [
                    'Design Change Support: 10,000 taka / $150 per design',
                    'Content Change Support: 2000 taka / $25 per month(Max 2 times)',
                    'Content Change Support: 4000 taka / $ 50 per month(Max 5 times)',
                    'Content Change Support: 8000 taka / $100 per month(Max 12 times)',
                    'Content Change Support: 25000 taka / $330 per month(Unlimited times 10-6 pm)',
                    'Hacking / Virus / Malware Remove support: 10,000 Taka / $ 130 (1 Time)',
                ]],
                ['type' => 'bullets', 'size' => 'lg', 'title' => 'Training:', 'items' => [
                    '1st Training(1 hour): Free',
                    '2nd Training: 2000 taka / $25 per hour',
                    'Training: 5000 taka / $70 per hour -After 1st training, if needed.',
                ]],
                ['type' => 'bullets', 'size' => 'lg', 'title' => 'Payment Procedure:', 'items' => [
                    '50% advance payment for website development',
                    '50% due payment within 3 days after complete the full project.',
                    'Client must provide all content with work order.',
                    'Payment will goes to "BASE IT" account pay check.',
                ]],
                ['type' => 'bullets', 'size' => 'lg', 'title' => 'Terms & Condition:', 'items' => [
                    'If Client Failed to provide the content within 30 days after contract then the project will count as a complete project.',
                    'Post Sales Support: 1 month',
                    'Charges per extra pages: 2000 taka / $26',
                    'If the page size is more the A4 size then additional cost will be 2000 taka / $26 per A4 size Content',
                    'Domain and hosting must be renewing in every year before 1 month of expired date. Otherwise additional cost will be added according to the domain hosting renew rules. For more Visit: baseit.com.bd',
                    'If image need to customized like background change or color change or any kind of editing then additional cost will be 50 taka / $0.7 per picture.',
                ]],
            ],
        ],

        'job-portal' => [
            'title' => 'Job Portal', 'subtitle' => 'Get your own Website here', 'parent' => 'website',
            'classic' => true,
            'blocks' => [
                ['type' => 'heading', 'small' => 'Job Portal', 'highlight' => 'Create Job Portal website', 'rest' => 'in Cheap rate'],
                ['type' => 'media', 'img' => 'welcome/baseit/job-portal.jpg', 'art' => 'job', 'cols' => 'minmax(0, 38fr) minmax(0, 62fr)', 'align' => 'start', 'body' => $dynamicIntro],
                ['type' => 'pricebar', 'name' => 'Job Portal', 'price' => '৳450,000 / $5625'],
            ],
        ],

        'mobile-apps' => [
            'title' => 'Mobile Apps', 'subtitle' => 'Smart Application to Smart Phone', 'parent' => 'website',
            'classic' => true,
            'blocks' => [
                ['type' => 'heading', 'small' => 'Mobile Apps', 'highlight' => 'Create your App', 'rest' => 'in a cheap rate'],
                ['type' => 'media', 'img' => 'welcome/baseit/mobile-app-cycle.png', 'cols' => 'minmax(0, 30fr) minmax(0, 70fr)', 'body' => [
                    'BASE IT is one of the oldest and affordable mobile application developing companies that you can find in Bangladesh. With vast knowledge and experience in the industry, we are not only focused on providing and making you the best mobile application that you need, BASE IT also aims to let their clients be a part of the mobile application development process, thus, the more the customer\'s desired development for the mobile application are achieved.',
                    'If you are planning to hire developers or programmers for mobile application development, you must first consider some important factors so that in the end you are assured that you will get the best company that will give you the best application and will apply development according to your needs.',
                ]],
                ['type' => 'para', 'body' => [
                    'The first factor that you must consider is to know how experienced the company is in the field of mobile application development. Company must have clear knowledge of mobile application programs as well as designs.',
                    'Once you are certain that the company is experienced, then, you are also assured that they will be able to serve you better. Since there are many kinds of mobile applications, you must know the kind of mobile applications that the company could provide for you.',
                ]],
                ['type' => 'image', 'img' => 'welcome/baseit/mobile-app-banner.jpg', 'alt' => 'iOS, Android Mobile Application Development'],
                ['type' => 'para', 'title' => 'Choose Base IT:', 'body' => [
                    'baseit.com.bd is a mobile application and website developing company in Bangladesh that always makes sure that the apps are made in the highest of standard and quality. We have dedicated developers that are well versed in developing mobile apps for Android, Blackberry, iOS, Windows Phone and a lot more. For the most part, we provide mobile applications that are world class, user friendly, with high quality and apps that our clients will surely love. Reputation is something that we always care.',
                ]],
                ['type' => 'para', 'body' => [
                    'There is also the price of the service that must be considered. From among the many mobile application developer, you can find a company that will provide you the mobile applications that you need in a cheaper price but quality guaranteed.',
                ]],
                ['type' => 'pricebar', 'name' => 'Andriod Apps', 'price' => '৳70,000 / $875'],
                ['type' => 'pricebar', 'name' => 'iPhone Apps', 'price' => '৳100,000 / $1250'],
            ],
        ],

        'logo-design' => [
            'title' => 'Logo Design', 'subtitle' => 'Design Your logo in Cheap Rate', 'parent' => 'website',
            'classic' => true,
            'blocks' => [
                ['type' => 'heading', 'small' => 'Logo Design', 'before' => 'Design your', 'highlight' => 'Spectacular Logos', 'rest' => ''],
                ['type' => 'logo_grid'],
                ['type' => 'pricing', 'width' => 900, 'plan_width' => 300, 'items' => [
                    ['name' => 'Logo Design', 'price' => '10,000 TK / $150', 'rows' => [
                        '5 design concepts', '2 professional designers', '2 revisions', 'Satisfaction guaranteed',
                        '24/7 Email support', 'Phone support', 'Dedicated project manage',
                    ]],
                ]],
            ],
        ],

        /* ----- Software ----- */
        'software' => [
            'title' => 'Software', 'subtitle' => 'Find your software in Cheap rate.',
            'blocks' => [
                ['type' => 'menu_cards', 'menu' => 'software'],
            ],
        ],

        'inventory-management-system' => [
            'title' => 'Inventory Management System', 'subtitle' => 'All About Inventory Management System Software', 'parent' => 'software',
            'classic' => true,
            'sidebar' => 'software',
            'blocks' => [
                ['type' => 'heading', 'small' => 'Inventory Management System', 'highlight' => 'Find your software', 'rest' => 'in Cheap rate'],
                ['type' => 'pricebar', 'name' => 'Inventory Management System', 'price' => '৳4,50,000 / $5625'],
                ['type' => 'figure', 'img' => 'welcome/baseit/inventory-management.png', 'art' => 'inventory', 'alt' => 'Inventory Management System'],
                ['type' => 'checklists', 'sections' => [
                    ['title' => 'Admin Panel', 'items' => [
                        'Company Profile (Create Head Office)', 'Branch (Create Branch)', 'Employee Type',
                        'Employee Information', 'Employee Role Assign (User Access Setup)',
                    ]],
                    ['title' => 'Head Office/Central Module', 'items' => [
                        'Central under Stock', 'Purchase Requisition', 'Purchase Order', 'Purchase Invoice',
                        'Purchase/Stock In', 'Purchase Payment', 'Purchase Due Payment', 'All Purchase View',
                        'Challan to Branch', 'Challan View branch wise', 'Branch Return Receive', 'Central to party return',
                        'Central to party return view', 'Purchase statement', 'Sales Details (Branch wise)', 'Export Ledger',
                    ]],
                    ['title' => 'Report', 'items' => [
                        'Central Stock Status', 'Operation Summary', 'Branch Sales Details', 'Sales Report Print',
                        'Purchase Statement', 'Export Ledger', 'Rating of Goods', 'All Purchase View', 'All Challan View',
                        'Party Return View',
                    ]],
                    ['title' => 'Additional', 'items' => [
                        'Purchase Summary Report', 'Date Wise Purchase Report', 'Supplier Payment Report',
                        'Suppliers date wise purchase Report', 'Supplier or Company info details Report',
                        'Inventory Order, Reorder level Etc.',
                    ]],
                    ['title' => 'Branch/Shop/Sales Module:', 'items' => [
                        'Sales Goods', 'Manually Barcode (Barcode Reader Sales Management and Tracking)', 'Print Sales Invoice',
                        'Under Stock', 'Branch Requisition (Create Requisition to Central)', 'Change Product', 'Return to Central',
                        'Branch return View', 'Sales Statement', 'Expense', 'Expense Head', 'Expense Entry',
                    ]],
                    ['title' => 'Report', 'items' => [
                        'Branch Stock', 'Branch Sales Details', 'Shop Sales Report', 'Shop Return View',
                        'Rating of Goods (Most Saleable Product)',
                    ]],
                    ['title' => 'Additional', 'items' => [
                        'Branch Wise Invoice Challan', 'Sales Discount', 'Sale through Cash/Card', 'Sales Summary Report',
                        'Date Wise Sales Details Report', 'Sales Product Return/Change Report',
                    ]],
                    ['title' => 'Product/Goods', 'items' => [
                        'Company Information/Supplier /Vendor Information/', 'Product Category', 'Product Unit', 'Product Entry',
                        'Product Reorder (Threshold Value)', 'Product/Goods list', 'Stock Goods Shop', 'Stock Goods Central',
                    ]],
                    ['title' => 'Company Transaction:', 'items' => [
                        ['text' => '1. Collection Entry', 'children' => ['Bank Transaction', 'Cash Transaction']],
                        ['text' => '1. Transaction Report', 'children' => ['Current Asset', 'Company Cash', 'Individual Bank', 'Bank all Transaction']],
                    ]],
                    ['title' => 'Inventory (Stock Status):', 'items' => [
                        'Branch Wise Stock Summary', 'Product Wise Stock Summary', 'Style Search', 'Reject Goods', 'Return Goods',
                        'Receive Goods', 'Stock Report', 'Stock Ledger',
                        'Label Indicator (Defined for each and every product when the product under the minimum label of stock)',
                        'Category Wise Stock Summary', 'Supplier Wise Stock Summary',
                    ]],
                ]],
                ['type' => 'pricebar', 'name' => 'Inventory Management System', 'price' => '৳4,50,000 / $5625'],
            ],
        ],

        'accounting-finance-management-system' => [
            'title' => 'Accounting / Finance Management System', 'subtitle' => 'All About Accounting / Finance management System Software', 'parent' => 'software',
            'classic' => true,
            'sidebar' => 'software',
            'blocks' => [
                ['type' => 'heading', 'small' => 'Accounting / Finance Management System', 'highlight' => 'Find your software', 'rest' => 'in Cheap rate'],
                ['type' => 'pricebar', 'name' => 'Accounting / Finance Management System', 'price' => '৳1,50,000 / $1875'],
                ['type' => 'toggle', 'title' => 'Accounting or Financial Management System', 'open' => true, 'blocks' => [
                    ['type' => 'figure', 'img' => 'welcome/baseit/accounting.png', 'alt' => 'Accounting / Finance Management System'],
                    ['type' => 'checklists', 'sections' => [
                        ['title' => 'Accounting Management System Software Features', 'items' => [
                            'Accounts Head', 'Chart of Account', 'Voucher (Bank Voucher, Receipt Voucher, Journal, Payment Voucher)',
                            'Journal Entry', 'Journal Update', 'Last Journal', 'Date wise journal',
                        ]],
                        ['title' => 'Report', 'items' => [
                            'Trail Balance', 'Balance Sheet', 'Income Statement', 'Cash Flow', 'Liabilities',
                            'Expense (Branch wise & Central/Head Office)', 'Sale Summary', 'Sale Memo', 'Sale Details',
                            'Account Deposit', 'Account Withdraw', 'Sale through Card', 'Receive Card Amount', 'Owner Activity Statement',
                        ]],
                    ]],
                ]],
                ['type' => 'pricebar', 'name' => 'Accounting / Finance Management System', 'price' => '৳1,50,000 / $1875'],
            ],
        ],

        'realestate-management-system' => [
            'title' => 'Real Estate Management System', 'subtitle' => 'All About Real Estate Management System Software', 'parent' => 'software',
            'classic' => true,
            'sidebar' => 'software',
            'blocks' => [
                ['type' => 'heading', 'small' => 'Real Estate Management System', 'highlight' => 'Find your software', 'rest' => 'in Cheap rate'],
                ['type' => 'pricebar', 'name' => 'Real Estate Management', 'price' => '৳4,95,000 / $5625'],
                ['type' => 'toggle', 'title' => 'Real Estate Management System', 'open' => true, 'blocks' => [
                    ['type' => 'checklists', 'style' => 'numbered', 'sections' => [
                        ['title' => 'Basic Setting', 'items' => [
                            'Company Profile (Create Head Office)', 'Project/Plot/Create (Edit/Update/Delete)',
                            'Employee Information', 'Employee Role Assign (User Access Setup)',
                        ]],
                        ['title' => 'Customer', 'items' => [
                            'Customer Registration (Customer Name, N.ID, Picture, DOB, Cell, Nominee1/2/3 etc)',
                            'Add new customer', 'List of customer', 'Customer Ledger',
                        ]],
                        ['title' => 'Booking', 'items' => ['Installment', 'Short Term', 'Long Term', 'Total Installment', 'Fixed']],
                        ['title' => 'Sales /Invoice', 'items' => ['Create invoice', 'List invoice', 'Bill to Bill payment system', 'Refund System']],
                        ['title' => 'Projects info', 'items' => ['Create Project with details', 'List of projects']],
                        ['title' => 'Plot Issue', 'items' => [
                            'Plot Issue to a project', 'Plot Issue/Booked/Available with details Customer ledger', 'List of issue',
                        ]],
                        ['title' => 'Sales and Commission-', 'text' => 'Create sales or commission person profile to track this commission and payment.'],
                        ['title' => 'Accounts / Cashbook', 'items' => [
                            'Create accounts', 'Petty cash', 'Balance transfer account to account', 'Transaction history',
                            'Account statement.', 'Balance status',
                        ]],
                        ['title' => 'Corporate Expenses', 'items' => ['Dynamic Head, subhead create system', 'Head, sub head wise expense add system']],
                        ['title' => 'Project Expenses (Project wise)', 'items' => ['Dynamic Head, sub head create system', 'Head, subhead wise expense add system']],
                        ['title' => 'Reports', 'items' => [
                            'Sales report (Custom Date wise)', 'Project wise', 'Plot wise', 'Overall/ Date to date', 'Collection report',
                            'Daily and monthly financial summary', 'Customer ledger', 'Balance sheet',
                            'Profit loss (Gross-Project wise & Net)', 'Refund report', 'Expense report',
                        ]],
                    ]],
                ]],
                ['type' => 'pricebar', 'name' => 'Real Estate Management', 'price' => '৳4,95,000 / $5625'],
            ],
        ],

        'hr-payroll-management-system' => [
            'title' => 'HR/Payroll Management System', 'subtitle' => 'All About HR/Payroll Management System Software', 'parent' => 'software',
            'classic' => true,
            'sidebar' => 'software',
            'blocks' => [
                ['type' => 'heading', 'small' => 'HR / Payroll Management System', 'highlight' => 'Find your software', 'rest' => 'in Cheap rate'],
                ['type' => 'pricebar', 'name' => 'HR/Payroll Management System', 'price' => '৳420,000 / $5250'],
                ['type' => 'toggle', 'title' => 'HR Payroll Software', 'open' => true, 'blocks' => [
                    ['type' => 'figure', 'img' => 'welcome/baseit/hr-payroll.jpg', 'alt' => 'HR Payroll Management System'],
                    ['type' => 'checklists', 'sections' => [
                        ['title' => 'Software Features', 'items' => [
                            'Employee Information', 'Company Information', 'Attendance Bonus', 'Salary Grade', 'Shift Schedules',
                            'Leave, Fixed Bonus', 'Designation Bonus', 'Weekly Allowance', 'Entry System', 'Increment',
                            'Advance Loan', 'Salary',
                        ]],
                        ['title' => 'Report', 'items' => [
                            'Daily present & absent report.', 'Leave report, late report.', 'In & out report, OT report.',
                            'Attendance Register.', 'OT Register.', 'EOT Register.', 'Increment Report.', 'Promotion Report.',
                            'Job Card, Monthly Salary Sheet.', 'Pay Slip.', 'Salary Summary Report.', 'Maternity Benefit Report.',
                            'Festival Bonus summary.', 'Advance salary sheet.',
                        ]],
                    ]],
                ]],
                ['type' => 'pricebar', 'name' => 'HR/Payroll Management System', 'price' => '৳420,000 / $5250'],
            ],
        ],

        'garments-erp' => [
            'title' => 'Garments ERP Management System', 'subtitle' => 'All About Garments ERP Management System Software', 'parent' => 'software',
            'classic' => true,
            'sidebar' => 'software',
            'blocks' => [
                ['type' => 'heading', 'small' => 'Garments ERP Management System', 'highlight' => 'Find your software', 'rest' => 'in Cheap rate'],
                ['type' => 'pricebar', 'name' => 'Garments ERP', 'price' => '৳50,50,000 / $63125'],
                ['type' => 'toggle', 'title' => 'Garments ERP', 'open' => true, 'blocks' => [
                    ['type' => 'doc', 'parts' => [
                        ['p' => 'Benefits of Garments ERP Software:'],
                        ['p' => 'Garments ERP software has a lot of benefits for textile and apparel industries.'],
                        ['ul' => [
                            'Everyone deals with a centralized database system.',
                            'Plays an important role in easily monitoring of industry.',
                            'Takes less time than manual data entry process.',
                            'Easily accessible from anywhere at any time in world.',
                            'Remove the possibility of unauthorized data manipulation.',
                            'Faster decision making from reports within a very short time.',
                        ]],
                        ['label' => 'Basic Modules for Garments ERP'],
                        ['ol' => [
                            'Marketing', 'Merchandising', 'Time & Action (TNA)', 'Work Study/IE', 'Planning',
                            'Dyeing & Finishing Service Work Order', 'Commercial', 'Gate Entry', 'Yarn Store',
                            'Knit Grey Fabric Production', 'Grey Fabric Store', 'Dyes and Chemical Store',
                            'Fabric Dyeing & Finishing Production', 'Finish Fabric Store', 'Trims Store',
                            ['text' => 'Garments Production', 'children' => ['Cutting', 'Embellishment', 'Sewing']],
                            'General Store', 'Central Store Management', 'Sample Garments Production', 'Buyer/Subcontract Management',
                        ]],
                    ]],
                ]],
                ['type' => 'pricebar', 'name' => 'Garments ERP', 'price' => '৳50,50,000 / $63125'],
            ],
        ],

        'hospital-management-system' => [
            'title' => 'Hospital Management System', 'subtitle' => 'All About hospital management System Software', 'parent' => 'software',
            'classic' => true,
            'sidebar' => 'software',
            'blocks' => [
                ['type' => 'heading', 'small' => 'Hospital Management System', 'highlight' => 'Find your software', 'rest' => 'in Cheap rate'],
                ['type' => 'pricebar', 'name' => 'Hospital Management System', 'price' => '৳395,000 / $4950'],
                ['type' => 'figure', 'img' => 'welcome/baseit/hospital-management.jpg', 'alt' => 'Hospital Management System'],
                ['type' => 'checklists', 'sections' => [
                    ['title' => 'Hospital Management System features:', 'items' => [
                        'Helps in faster clinical assessment and administrative handling of patients.',
                        'Generates timely & accurate patient information and helps in clinical audit.',
                        'Supports care at the point of delivery.',
                        'Helps in informed clinical decision making based on up-to date patient information.',
                        'Have intuitive, easy to use screen designs for smooth navigation between modules.',
                        'Has single point data entry in all relevant modules and departments.',
                        'Supports dynamics data sharing throughout the institution.',
                        'Gives access to accurate information only after multi-level security validation most user- friendly software available.',
                        'Is flexible to meet the changing requirement and needs of yours.',
                        'Comes with point of care knowledge bases.',
                        'Is built on latest recommendation of International Standards in healthcare.',
                    ]],
                    ['title' => 'Modules:', 'items' => [
                        'Patient Registration.', 'Patient Admission.', 'Doctor Appointment scheduling.', 'Patient Billing.', 'OT service',
                        'Pharmacy.', 'Payroll.', 'Admission Discharge Transfer.', 'Hospital Service Management.', 'Doctor Service Management.',
                        'Bed Management.', 'Wards Management Module.', 'Room Management.', 'Patient Relations.', 'Stock Details Modules.',
                        'Customer Details.', 'Employee Management.', 'Equipment Management.', 'Reports.',
                    ]],
                    ['title' => 'Hospital Service –Front Desk (Outdoor-OPD, Indoor-IPD & imaging system)', 'items' => [
                        ['text' => '1.1 Bed management', 'children' => ['1.1.1 Department', '1.1.2 Room setup', '1.1.3 Bed Setup']],
                        ['text' => '1.2 Patient Registration', 'children' => ['1.2.1 Patient Registration Info', '1.2.2 Outdoor Patient Registration', '1.2.3 Indoor Patient Registration']],
                        ['text' => '1.3 Patient Prescription', 'children' => ['1.3.1 Outdoor Prescription', '1.3.2 Indoor Prescription']],
                        ['text' => '1.4 Patient service', 'children' => ['1.4.1 Service Entry', '1.4.2 Indoor Patient Service Entry', '1.4.3 Indoor Patient Payment', '1.4.4 Indoor Patient Balance Check']],
                    ]],
                    ['title' => 'Laboratory Service (Pathology, Radiology & USG)', 'items' => [
                        '2.1 Test Category', '2.2 Test Name', '2.3 Payment Page',
                        ['text' => '2.4 USG (Ultrasound Scan)', 'children' => ['2.4.1 USG Gallbladder', '2.4.2 USG Kidney', '2.4.3 USG Uterus', '2.4.4 USG Prostate', '2.4.5 USG Urinary bladder']],
                        ['text' => '2.5 Pathology', 'children' => ['2.5.1 Biochemistry', '2.5.2 Blood']],
                    ]],
                    ['title' => 'Account Management System:', 'items' => [
                        ['text' => '3.1 Bank Account Setup', 'children' => ['3.1.1 Bank Name Setup', '3.1.2 Account Type Setup', '3.1.3 Account Info Setup']],
                        ['text' => '3.2 Company Transaction', 'children' => ['3.2.1 Company Transaction', '3.2.2 Employee Salary Payment']],
                        ['text' => '3.3 Accounts', 'children' => ['3.3.1 Head Creation', '3.3.2 Chart of accounts (COA)', '3.3.3 Voucher Information', '3.3.4 Journal']],
                        ['text' => '3.4 Report', 'children' => [
                            '3.4.1 Trial Balance', '3.4.2 Journal', '3.4.3 Ledger', '3.4.4 Profit & Loss', '3.4.5 Balance Sheet',
                            '3.4.6 Statement', '3.4.7 Payable Account', '3.4.8 Receivable Account', '3.4.9 Asset Registration', '3.4.10 Cash Flow',
                        ]],
                    ]],
                    ['title' => 'Employee Management System', 'items' => [
                        ['text' => '4.1 Pay Roll Setup File', 'children' => ['4.1.1 Employee Type Name', '4.1.2 Specialist', '4.1.3 Employee Designation Setup', '4.1.4 Leave and Work Shift Setup']],
                        ['text' => '4.2 Employee Info Entry', 'children' => [
                            '4.2.1.1 Basic Info', '4.2.1.2 Education Info', '4.2.1.3 Training Info', '4.2.1.4 Experience Info',
                            '4.2.1.5 Service Discount and Commission', '4.2.2 Basic Salary Setup', '4.2.3 Employee Location and Service',
                        ]],
                        ['text' => '4.3 Attendance and Absence', 'children' => ['4.3.1 Employee Daily Attendance', '4.3.2 Employee Absence Info']],
                    ]],
                    ['title' => 'Pharmacy Management System', 'items' => [
                        '5.1 Medication Type', '5.2 Company Info', '5.3 Medication Name entries', '5.4 Purchase Medication',
                        '5.5 Purchase Payment', '5.6 Sales Medication',
                    ]],
                    ['title' => 'Inventory Management System', 'items' => [
                        '6.1 Company Information', '6.2 Product Category', '6.3 Product Entry', '6.4 Under Stock', '6.5 Purchase requisition',
                        '6.6 Purchase Order', '6.7 Stock In', '6.8 Stock Out',
                        ['text' => '6.9 Report', 'children' => ['6.9.1 Last Purchase Order', '6.9.2 Last Stock In', '6.9.3 Last Stock Out', '6.9.4 Stock Status.']],
                    ]],
                ]],
                ['type' => 'pricebar', 'name' => 'Hospital Management System', 'price' => '৳395,000 / $4950'],
            ],
        ],

        'rent-management-system' => [
            'title' => 'Asset / Rent Management System', 'subtitle' => 'All About Asset / Rent Management System Software', 'parent' => 'software',
            'classic' => true,
            'sidebar' => 'software',
            'blocks' => [
                ['type' => 'heading', 'small' => 'Asset / Rent Management System', 'highlight' => 'Find your software', 'rest' => 'in Cheap rate'],
                ['type' => 'pricebar', 'name' => 'Asset/Rent Management System', 'price' => '৳395,600 / $4950'],
                ['type' => 'toggle', 'title' => 'Asset or Rent Management System', 'open' => true, 'blocks' => [
                    ['type' => 'figure', 'img' => 'welcome/baseit/rent-management.png', 'alt' => 'Asset / Rent Management System', 'width' => 330],
                    ['type' => 'doc', 'parts' => [
                        ['h' => '1. Information/Set Up File Information'],
                        ['ola' => [
                            'Company profile', 'Employee profile (ID Wise)', 'Complex Profile/Market Information (ID Wise)',
                            'Tenant Basic Information (ID Wise), Search facilities', 'Bank Account Information Setup',
                        ]],
                        ['h' => '2. Booking Shop'],
                        ['ola' => [
                            'Tenant ID', 'Deposit/ Security money', 'Rent (Per Sft.)', 'Total Rent', 'Floor, Flat/Shop No.',
                            'Advance , Refund', 'Booking Date', 'Booked, Delete, update and quit facilities', 'Search facilities',
                        ]],
                        ['h' => '3. Cancel Shop'],
                        ['ola' => ['Complex ID, Name, Floor, Flat/Shop', 'Delete, Cancel facilities']],
                        ['h' => '4. Rent Allowance'],
                        ['ola' => [
                            ['text' => 'Monthly Bill Allowance', 'children' => [
                                'All tenant, Selected Shop, floor wise', 'Year, Month, date',
                                'Maintenance & Service Charge(Tenant Name, Floor, Rent, Electric, Gas, Water )',
                            ]],
                        ]],
                        ['h' => '5. Rent Collect'],
                        ['ola' => [
                            'Complex Id, Floor, Type, tenant ID, Bank Name, Branch cash/bank', 'Total Rent, Less for advance, Net Payable',
                            'Receive & Print Money Receipts with Memo Number', 'Date wise', 'Search facilities',
                        ]],
                        ['h' => '6. Salary Paid'],
                        ['ola' => [
                            'Employee Id, employee Type, Month, Year,Date', 'Advance, Advance Refund', 'Cash, Bank, Memo No.', 'Print Money receipt',
                        ]],
                        ['h' => '7. Bank Transaction'],
                        ['ola' => [
                            'Withdraw, Deposit', 'Date, Bank Name, Check No, Withdrawn By',
                            'Current Balance, withdraw Amount, Transfer one account to another account',
                        ]],
                        ['h' => '8. Expense'],
                        ['ola' => [
                            'Administrative expense', 'Date , expense description, expense by, amount',
                            'Cash, check, paid by bank name, memo no.', 'Print facilities, show expense by date to date',
                        ]],
                        ['h' => '9. Report'],
                        ['ola' => [
                            'Tenant Information Complex wise, Floor wise, Complex Id, Complex Name, Floor wise',
                            'All Shop, Available, Booked , floor wise', 'Tenant Transaction , date wise DUE, Payment',
                            'Administrative expense date wise', 'Bank Statement Date to Date , Individual Bank Name, Branch with Account Name',
                            'Total Income Report', 'Total Expense', 'Balance Sheet',
                        ]],
                    ]],
                ]],
                ['type' => 'pricebar', 'name' => 'Asset/Rent Management System', 'price' => '৳395,600 / $4950'],
            ],
        ],

        'travel-tours-management-system' => [
            'title' => 'Travel & Tours Management System', 'subtitle' => 'All About Travel & Tours Management System Software', 'parent' => 'software',
            'classic' => true,
            'sidebar' => 'software',
            'blocks' => [
                ['type' => 'heading', 'small' => 'Travel & Tours Management System', 'highlight' => 'Find your software', 'rest' => 'in Cheap rate'],
                ['type' => 'pricebar', 'name' => 'Travel & Tours Management System', 'price' => '৳1,50,000 / $1950'],
                ['type' => 'toggle', 'title' => 'Travel & Tours Management System', 'open' => true, 'blocks' => [
                    ['type' => 'doc', 'parts' => [
                        ['h' => 'Travel & Tours Management System:'],
                        ['plain' => [
                            '1. Office Automation', '2. Accounting', '3. Inventory Stock',
                            '4. Travel management system', '5. Agent management system',
                        ]],
                        ['p' => 'System user’s type: Super admin, admin, end user'],
                        ['lines' => [
                            'The user can login to the system with their username & password with some predefined access limit.',
                            'Admin can create, delete and update information.',
                            'Accounts with commissioning',
                            'Agent management, information, Stock & Inventory',
                            'System will notify Urgent jobs and threshold limit.',
                            'System will generate Payment sleep, Invoice and Passenger /Agent billing.',
                            'User can create, delete and update Expense Head/Subhead and make the expense transaction.',
                            'All payment transaction can be made by direct cash or bank.',
                            'Create Bank and branch information.',
                        ]],
                        ['b' => 'Reports:'],
                        ['lines' => [
                            'Payment sleep', 'Individual agent/passenger report', 'Profit/Loss Report', 'Expense Report',
                            'Total agent/passenger report', 'Income report', 'Balance sheet', 'Agent information, commission, others',
                        ]],
                    ]],
                ]],
                ['type' => 'pricebar', 'name' => 'Travel & Tours Management System', 'price' => '৳1,50,000 / $1950'],
            ],
        ],

        'school-college-management-software' => [
            'title' => 'School / College Management System', 'subtitle' => 'All About School / College Management System Software', 'parent' => 'software',
            'classic' => true,
            'sidebar' => 'software',
            'blocks' => [
                ['type' => 'heading', 'small' => 'School Management System Software', 'highlight' => 'Find your software', 'rest' => 'in Cheap rate'],
                ['type' => 'pricebar', 'name' => 'School Management Software', 'price' => '৳2,50,000 / $3,125'],
                ['type' => 'doc', 'parts' => [
                    ['b' => 'School Management System-'],
                    ['ul' => [
                        '**Student Admission:** By filling up certain relevant boxes a student’s profile can be created and saved in the system.',
                        '**Student Registration:** By registering the student in the system his/her class, group, section & shift can be saved in the system.',
                        '**Metit List:** The Merit List shows a particular class’s section’s shift’s total merit positions with name GPA, Total GP, Total marks and subjects failed.',
                        '**Progress Report:** The Progress Report shows a particular student’s subject wise mark distribution.',
                        '**Tabulation Sheet:** It shows a particular class’s section’s shift’s tabulations sheet of those student with GPA, Pass/Fail and position.',
                        '**Teacher Assaign:** With the help of this software a teacher can be assigned according to group, shift, section and class.',
                        '**Mark Distubition:** In this section marks of students are given or awarded by the authorized user according to group, shift, section and class.',
                        '**Aptituite:** In this section Aptitudes of students are given or awarded by the authorized user according to group, shift, section and class.',
                        '**Add New User:** In this section a new user can be assigned by fulfilling conditions by choosing user type',
                        '**Accounts:** It will be done after receiving client’s requirements. We have done Basic Accounts Income, Expense etc.',
                    ]],
                ]],
                ['type' => 'figure', 'img' => 'welcome/baseit/school-management.png', 'alt' => 'School Management System', 'width' => 520],
                ['type' => 'doc', 'parts' => [
                    ['b' => 'Available Featured Modules:'],
                    ['ul' => [
                        'Subject management.', 'Class management.', 'Payments Overview.', 'Subjects management.', 'Fees management.',
                        'Overdue students list.', 'Student management.', 'Teacher Management.', 'Records management.',
                        'Management relationships between different types of users.', 'Reports generator.', 'SMS Alerts.',
                    ]],
                    ['b' => 'Features related to Students-'],
                    ['ul' => ['Students Admission.', 'Students Registration.', 'Students Search']],
                    ['b' => 'Features related to Teachers –'],
                    ['ul' => [
                        'Student, teacher details', 'Teacher Search', 'Teacher Assign', 'Class Management',
                        'Section, Group, Shift etc. management', 'Marks distribution', 'Progress Report', 'Merit list', 'Tabulation Sheet',
                    ]],
                    ['b' => 'Features related to Accounts and administration –'],
                    ['ul' => [
                        'Institutional income information and report (on daily, monthly and yearly basis)',
                        'Institutional expense information and report (on daily, monthly and yearly basis)',
                        'Institutional, Managerial other reports (Based on requirements)',
                    ]],
                    ['b' => 'Online and Smart Messaging Services (SMS):'],
                    ['p' => 'The main authority of the school can see the list of all absent and late students, and the parents also get the same alert.'],
                    ['ul' => [
                        'Parents are informed regarding their children by SMS, Email and website. Classes of absent teachers are distributed to teachers in the same department and they are instantly informed by an alert SMS.',
                        'Instant alert regarding any important notices will go to all stake holders, teachers, staff and parents',
                        'Parents can ensure all the information of a student in the online by giving ID number.',
                    ]],
                ]],
                ['type' => 'pricebar', 'name' => 'School Management Software', 'price' => '৳2,50,000 / $3,125'],
            ],
        ],

        'mlm-system' => [
            'title' => 'MLM System', 'subtitle' => 'All About MLM Management System Software', 'parent' => 'software',
            'classic' => true,
            'sidebar' => 'software',
            'blocks' => [
                ['type' => 'heading', 'small' => 'MLM Management Software', 'highlight' => 'Find your software', 'rest' => 'in Cheap rate'],
                ['type' => 'pricebar', 'name' => 'MLM Management Software', 'price' => '৳4,95,000 / $5625'],
                ['type' => 'toggle', 'title' => 'MLM Management System', 'open' => true, 'blocks' => [
                    ['type' => 'figure', 'img' => 'welcome/baseit/mlm-system.png', 'alt' => 'MLM Management System'],
                    ['type' => 'doc', 'parts' => [
                        ['orange' => 'Admin Panel'],
                        ['ol' => [
                            'Setup:',
                            'Company Name, Phone, Email, Address, Website, Matching Point, Matching Amount, Logo (Edit/Update)',
                            'User Access',
                            'User List',
                            'Package: Add New Package (Sl, Package. Name, Package. Price, Package. Point, Package. Type, Package. Time, Maximum Matching, Condition free, Action), All Packages (Edit/Update)',
                            'Client: All Client List (Sl, Sponsor ID, Position ID, Link, Name, Username, Activation Status, Status, Action)',
                            'Give Balance: Add New (Client, Balance, Note), All Balance List (Sl, Date, Trx ID, User ID, Description, Debit, Credit, Note, Action)',
                            'Commission: (Investment Profit Process)',
                            'Query: All Contact Mail List (SL, Name, Mobile, Email, Subject, Message, Status, Action)',
                            'Withdraw: All Pending Withdraw List (Sl, Date, Trans Type, User ID, Trans Number, Trns ID, Amount, Status, Note, Action), All Withdraw List (Sl, Date, Trans Type, User, Trans Number, Admin Trans Number, Amount, Status, Note, Action)',
                        ]],
                        ['orange' => 'User Dashboard/Panel:'],
                        ['p' => 'At a glance: Total User, Left User,Right User, Total Match, Left Point, Right Point, Total Active, Left Active, Right Active'],
                        ['ol' => [
                            'Client Profile ((Edit/Update):',
                            'Personal Information: (Username, Father Name, Mother Name, Date of Birth, NID, Occupation, Occupation Desc, Present Address, Permanent Address, Office Address etc.)',
                            'Bank Information: Bank Name, Branch Name, Account Number, Bank Country',
                            'Nominee Information: (Nominee Name, Father Name, NID, Date Of Birth, Relation)',
                            'Change Password (Edit/Update): Old Password, New Password, Confirm Password',
                            'Transaction: Transfer Balance (Transfer To ID, Available Balance, Transfer Balance, Note), All Transaction list (Sl, Date, Transaction Type, Debit, Credit, Balance, Note)',
                            'Purchases Package: New Purchase (Trx Id, Package List, Available Balance, Remain Balance), All Purchases Package List (Sl, Package, Purchases Date, First End Date, Last End Date, Trx ID, Price, Pay Amount)',
                            'All Packages: All Package List (Sl, Package.Name, Package.Price, Package.Point, Package.Type, Pay Amount, Package.Time, Maximum Matching, Condition free)',
                            'Network List / Binary Tree: Root -> Left, Right -> Children',
                            'Sponsor Commission List: Sl, Trx ID, Date, Description, Commission',
                            'All Matching List: Sl, Trx ID, Date, Description, Commission',
                            'Investment Commission List: Sl, Trx ID, Date, Description, Commission',
                            'Withdraw: Bank / Mobile Withdraw (Transaction Type, Account Number, Country, Bank Name, Branch, Available Balance, Withdraw Balance, Note), All Withdraw List (Sl, Date, Trans Type, AC Number, Admin, Trns ID, Amount, Status, Note)',
                            'Transfer Balance: Transfer To ID, Available Balance, Transfer Balance, Note',
                        ]],
                    ]],
                ]],
                ['type' => 'pricebar', 'name' => 'MLM Management Software', 'price' => '৳4,95,000 / $5625'],
            ],
        ],

        /* ----- Clients ----- */
        'clients' => [
            'title' => 'Our Clients', 'subtitle' => 'Our Respected Clients',
            'classic' => true,
            'blocks' => [
                ['type' => 'heading', 'small' => 'Clients', 'highlight' => '', 'rest' => 'Our Honourable Clients'],
                ['type' => 'logo_grid'],
                ['type' => 'client_az'],
            ],
        ],

        /* ----- Online Marketing ----- */
        'online-marketing' => [
            'title' => 'Online Marketing', 'subtitle' => '',
            'classic' => true,
            'crumb' => true,
            'blocks' => [
                ['type' => 'service_list', 'items' => [
                    ['title' => 'Email Marketing', 'slug' => 'email-marketing', 'icon' => 'far fa-envelope',
                     'text' => 'Corporate employer, CTO, CEO, Managing director, Club members(Like Dhaka club,Gulshan club, Uttara Club, Lions Club etc), Different organization member(Like BGMEA, BASIS, FBCCI etc), Different company owner and directors etc.'],
                    ['title' => 'SMS Marketing', 'slug' => 'sms-marketing', 'icon' => 'far fa-comments',
                     'text' => 'Mobile phone is the most popular technology of our daily life. This technology has become the main communication media. SMS is such a messaging service which may create instant response through mobile phone'],
                    ['title' => 'Search Engine Optimization', 'slug' => 'search-engine-optimization', 'icon' => 'fas fa-search',
                     'text' => 'Without the services of the search engines our websites may be seen by just a handful of people. Every popular search engine has its own terms on how they rank a particular website or a page within the site. Webmasters and web service providers keep constant track of the ever changing algorithms so that they can help the websites they are servicing to perform at optimal levels.'],
                ]],
            ],
        ],

        'email-marketing' => [
            'title' => 'Email Marketing', 'subtitle' => 'Promote your Company through Email', 'parent' => 'online-marketing',
            'classic' => true,
            'blocks' => [
                ['type' => 'heading', 'small' => 'Email Marketing', 'highlight' => '', 'rest' => 'Let the people know about your Company'],
                ['type' => 'doc', 'parts' => [
                    ['quote' => '"There is no best way to promote your product without advertisement."'],
                ]],
                ['type' => 'checklists', 'aside_img' => 'welcome/baseit/email-marketing.png', 'sections' => [
                    ['title' => 'Why Email Marketing?', 'items' => [
                        'Quick response & quick delivery.', 'Lowest cost and highest benefit.', 'Directly reach to the targeted people',
                        'Website address and email address can be linked directly.',
                        'Advertising space is not a issue. You can use unlimited space for advertisement.',
                        'You can use both picture and text. Beside this, you can use feedback form in email',
                        'You can increase your sells by email marketing. Beside this your company gets a brand position',
                        'Email will delivered by using your company email. So you will get any kind of reply in your email from clients.',
                    ]],
                    ['title' => 'Why you choose email marketing services from Base IT?', 'items' => [
                        'Cost effective.', 'Specific Clients area.', '80-90% inbox delivery.', '24*7 customer support.',
                        'Spam and bounce detector', '1 by 1 email sending system.', 'SMTP server with dedicated IP',
                        '15000+ satisfied clients worldwide.', 'Free consultancy for better advertisement.',
                        'Picture can add in body. No need to attachment', 'Automatically email delivery by Email marketing software.',
                        'All verified email. We use our customized software to verify all email.',
                    ]],
                ]],
                ['type' => 'doc', 'parts' => [
                    ['h' => 'Our Database:'],
                    ['b' => 'Corporate Area: 5,50,000+ Email Address'],
                    ['p' => 'Covered Area: Corporate employers, CTO, CEO, Managing Director, Club members (Dhaka Club, Gulshan Club, Uttara Club, Lions Club etc.), Members of different organizations (BGMEA, BASIS, FBCCI etc.), Owners and Directors of different companies.'],
                    ['hr' => true],
                    ['h' => 'So, what’s more you are waiting for?'],
                    ['plain' => [
                        'Call Us right now for a Email Marketing Solution at: +8801720437461',
                        'Or Email Us for a detailed proposal at: baseit007@gmail.com',
                    ]],
                    ['lead' => 'You can call us or meet us at our office anytime regarding your campaign, suggestions and marketing consultancy for FREE!'],
                    ['orange' => 'Email marketing Package Cost:'],
                    ['b' => 'Corporate Email Marketing (5.5 Lac Email): 15,000 Taka'],
                ]],
                ['type' => 'checklists', 'sections' => [
                    ['title' => 'Email marketing requirement:', 'items' => [
                        'Email body (Content may be picture or plain text or picture, text both or html formate).',
                        'Email subject (Not more than 80 characters).', 'Company name (Not more than 40 characters).', 'Email address.',
                    ]],
                    ['title' => 'What you will get in report?', 'items' => [
                        'How much email delivered in INBOX', 'How much email delivered in SPAM', 'How much email undelivered',
                        'Report will generate within 24 hour after complete the full email marketing',
                    ]],
                    ['title' => 'Some important information:', 'items' => [
                        'You can ensure your email marketing from the report or visiting our office or from response.',
                        'We do not provide email database report',
                        'We do not sale email address. We only send email by using our software and server.',
                        'We can operate the email marketing only from our office.',
                    ]],
                    ['title' => 'Payment Procedure:', 'items' => [
                        '100% advance payment', 'Payment will goes to "BASE IT" account pay check or cash.',
                        'Client must provide all content with work order.', 'Design charge 2000 taka ( if needed ).',
                    ]],
                ]],
                ['type' => 'pricebar', 'name' => 'Email Marketing', 'price' => '৳15,000 / $150'],
            ],
        ],

        'sms-marketing' => [
            'title' => 'SMS Marketing', 'subtitle' => 'Promote your Company through SMS', 'parent' => 'online-marketing',
            'classic' => true,
            'blocks' => [
                ['type' => 'heading', 'small' => 'SMS Marketing', 'highlight' => '', 'rest' => 'Let the people know about your Company'],
                ['type' => 'pricebar', 'name' => 'SMS Marketing', 'price' => '', 'button' => 'Order Now'],
                ['type' => 'doc', 'parts' => [
                    ['b' => 'SMS Marketing:'],
                    ['p' => 'Mobile phone is the most popular technology of our daily life. This technology has become the main communication media. SMS is such a messaging service which may create instant response through mobile phone. We like to inform you that our Base IT team has some qualified IT specialists who are skilled in SMS technology. So we are so much confident to deliver any kind SMS solution like bulk sms, push-pull sms, web based sms service.'],
                ]],
                ['type' => 'doc', 'aside_img' => 'welcome/baseit/sms-marketing.jpg', 'parts' => [
                    ['lead' => 'Call Us right now for a SMS Marketing Solution at: +8801712800947'],
                    ['plain' => ['Or Email Us for a detailed proposal at:info@baseit.com.bd']],
                    ['lead' => 'You can call us or meet us at our office anytime regarding your campaign, suggestions and marketing consultancy for FREE!'],
                    ['b' => 'Masking Information:'],
                    ['plain' => ['GP: Any Masking', 'Robi, Airtel, Banglalink: Any Masking', 'Teletalk, Citycell: Masking Not Allowed.']],
                    ['lead' => 'Call:01720437461 for SMS marketing'],
                ]],
                ['type' => 'checklists', 'sections' => [
                    ['title' => 'Scope of Our SMS Services', 'items' => [
                        'Job Notification', 'General Info (Office Address, Service Details)', 'Specific Information (Training/Cultural Program).',
                        'Notice / Greeting (Official / Occasional for target people).', 'Reminder for Due Payment / Due Inquiry',
                        'Events: Voting, Quiz contest (From on different programs of various media like TV/Radio/Newspaper)',
                        'Event Notification (Meeting ,Program ,others, Training)',
                    ]],
                ]],
                ['type' => 'doc', 'parts' => [['hr' => true]]],
                ['type' => 'checklists', 'sections' => [
                    ['title' => 'Benefits of Cell/Mobile Phone SMS Services', 'items' => [
                        'Now sms is a very effective way of direct communication.', 'People always check their SMS quickly',
                        'It has the power to create instant response', 'The response is very helpful to boost up your business.',
                        'Cheap cost marketing communication.',
                    ]],
                ]],
                ['type' => 'doc', 'parts' => [['h' => 'Database:']]],
                ['type' => 'checklists', 'sections' => [
                    ['title' => 'Corporate Area: Total 3,33,422+ Mobile No', 'items' => [
                        'Club member: 27,146', 'Association: 45,286', 'Company owner: 45,023',
                        'Top management (CEO, CTO, COO, DIRECTOR, MANAGER): 38,380', 'Government top employee: 23,112',
                        'Doctors: 10,225', 'Advocate and Barrister: 22,291', 'Engineer: 18,093', 'Chartered accountant: 1,734',
                        'Bar associates: 2,132',
                    ]],
                ]],
                ['type' => 'doc', 'parts' => [
                    ['h' => 'So, what’s more you are waiting for?'],
                    ['plain' => [
                        'Call Us right now for a SMS Marketing Solution at: +8801720437461',
                        'Or Email Us for a detailed proposal at: baseit007@gmail.com',
                        'You can call us or meet us at our office anytime regarding your campaign, suggestions and marketing consultancy for FREE!',
                    ]],
                ]],
                ['type' => 'checklists', 'sections' => [
                    ['title' => 'SMS marketing requirement:', 'items' => [
                        'Masking / Sender name / Phone no(11 characters)', 'SMS text (160 characters)', 'Target Group',
                    ]],
                    ['title' => 'What you will get in report?', 'items' => [
                        'All number with delivery report (2 number will replaced by XY)', 'We do not provide email database report',
                        'Undelivered report', 'Failed Report',
                    ]],
                    ['title' => 'Some important information:', 'items' => [
                        'You can ensure your SMS marketing from the report or visiting our office or from response.',
                        'We do not provide mobile no.',
                        'We do not sale mobile no. We only send sms by using our software and server.',
                        'We can operate the SMS marketing from anywhere.',
                    ]],
                    ['title' => 'Payment Procedure:', 'items' => [
                        '100% advance payment.', 'Payment will goes to "base it" account pay check or cash.',
                        'Client must provide all content with work order.',
                    ]],
                ]],
                ['type' => 'pricebar', 'name' => 'SMS Marketing', 'price' => '', 'button' => 'Order Now'],
            ],
        ],

        'search-engine-optimization' => [
            'title' => 'Search Engine Optimization', 'subtitle' => 'Make your Website Search Engine Friendly', 'parent' => 'online-marketing',
            'classic' => true,
            'blocks' => [
                ['type' => 'heading', 'small' => 'Search Engine Optimization', 'highlight' => '', 'rest' => 'Search & Get your website on Top.'],
                ['type' => 'doc', 'parts' => [
                    ['p' => 'Without search engines your web sites may be seen by only a handful of people. Every search engine has its own rules for ranking web sites, and webmasters keep track of the changing algorithms so that their sites keep performing well. Google is the most popular search engine, but the other search engines can not be ignored, because we never know the preferences of your specific customers or demographics.'],
                ]],
                ['type' => 'doc', 'aside_img' => 'welcome/baseit/seo.jpg', 'parts' => [
                    ['p' => 'Search Engine Optimization is an integral part of web promotion. SEO is a collection of methods and tools that helps your web site get listed on the first page of the popular search engines, so that it brings continuous targeted traffic to your business.'],
                    ['p' => 'Search engine marketing uses many of the same tools as SEO, but it needs a different kind of expertise. Our team handles both, so your web site gets the right visitors at the right time.'],
                ]],
                ['type' => 'doc', 'parts' => [
                    ['p' => 'After the design and features of your web site are discussed and finalized, the promotion starts as soon as the site is hosted and submitted to the search engines. Link building, directory submission, social bookmarking, blog posting and on-site SEO all start at the same time to grow your traffic. Even long-established web sites with millions of visitors need continuous care, and choosing the right keywords needs experienced professionals.'],
                    ['p' => 'Every business is different and so are its SEO needs. The bottom line is the relation between your investment and your sales. We build a customized SEO strategy for lasting results, using an ethical and organic approach aimed at your success and the best return on investment.'],
                ]],
                ['type' => 'checklists', 'sections' => [
                    ['title' => 'These are the key points includes to optimizing your website:', 'items' => [
                        'Search Engine Optimization content development for the site with targeted keywords.',
                        'Develop keyword density in links.', 'Images optimization (load time with alt tag)',
                        'Optimization all the pages of the site with keywords', 'Creation of Search Engine Friendly Site Map',
                        'Spell Checking for all the Webpages', 'Load Time Monitoring & Reporting', 'Link Popularity development',
                        'HTML Validation Checking', 'HTML Design Analysis & Changes accordingly', 'Browser Compatibility checking',
                        'Keyword Density maintenance', 'Backlinks Development', 'Creation of Optimized Robots.txt File',
                        'Develop inbound links for the pages (it will increase PR of the site)',
                        'Develop outbound links for all the pages (it will increase PR of the site)',
                        'Work on meta tag with Google bot.', 'Blogging for develop link popularity',
                        'Maintain forum for the pages to reach more visitor.',
                        'Depth Keyword Research & Suggestions Related to Your Industry', 'Targeting of Unlimited Keyword Phrases',
                        'Link Reputation Analysis', 'Linking Strategy and Management.', 'Link Management.', 'Pay for Placement.',
                        'Organic Search Engine Optimization.', 'Blogs Development.', 'Directory Management.', 'Internet Marketing.',
                    ]],
                ]],
                ['type' => 'table', 'style' => 'classic', 'order' => 'Order Now', 'label' => 'Search Engine Optimization Development Cost:',
                 'head' => ['S.L', 'Module', 'Cost (BDT)', 'To Buy'], 'rows' => [
                    ['01', 'Search Engine Optimization', '30,000 BDT. Per Months'],
                    ['02', 'Search Engine Optimization (at a time payment) 6*20,000=120,000 BDT.', '120,000 BDT. One Time Payment'],
                ]],
                ['type' => 'doc', 'parts' => [
                    ['b' => 'Estimated Time:'],
                    ['plain' => ['Minimum 4-6 Months for 1st Page.']],
                    ['b' => 'Payment Terms :'],
                    ['plain' => ['100% advance in case of Search Engine Optimization (SEO)']],
                    ['lead' => 'Order Now: 01712800947'],
                ]],
            ],
        ],

        /* ----- Training ----- */
        'training' => [
            'title' => 'Training', 'subtitle' => 'Our Training Courses available there',
            'classic' => true,
            'blocks' => [
                ['type' => 'heading', 'small' => '', 'highlight' => '', 'rest' => 'Importance of Training Courses'],
                ['type' => 'doc', 'parts' => [
                    ['p' => 'To be an IT Professional, Training is a most Important Step. As Training Center in Bangladesh – BASE IT Can Provide you most useful and realistic Training Courses that helps you become a real professional in your professional Life. Our Training Courses Cover full the Basic and Advance Training in this Course. Our Company gives all exercise elements and take the exam to endure, how much our students learn. We have an epic list of Training Course to find your own. If you don’t know where you start, ask our expert IT Course consultant to help you find your way.'],
                ]],
                ['type' => 'doc', 'aside_img' => 'welcome/baseit/training-courses.jpg', 'parts' => [
                    ['p' => 'There is no other better way to make money fast and quicker as possible rather than outsourcing and freelancing. Our Professional Courses in Bangladesh are built to make sure you learn everything there is to know about the IT sector. Our courses is structured for all types of people starting from students and employed office workers to unemployed workers and also people with no basic IT knowledge. Creativity in this field can take you as far as you want. Sitting at home and having full control over your financial situation is what all people want and Web Design is a great start.'],
                ]],
                ['type' => 'doc', 'parts' => [
                    ['p' => 'The importance of professional web design in Bangladesh is increasing day by day. Nowadays, the professional web designer and developer is a demanded career in Bangladesh and also world wide, which is clearly known to everyone in Bangladesh. BASE IT’S IT Courses in Bangladesh are designed for those who are new to IT sector and also for those who already have their hands on it. This certification program or course will provide participants with theories, tools, processes, competencies & practice needed to become a professional expert in Bangladesh.'],
                ]],
                ['type' => 'heading', 'small' => 'TRAINING', 'highlight' => '', 'rest' => 'Admission On with new batches', 'small_orange' => true],
                ['type' => 'courses', 'items' => [
                    ['title' => 'WEB DESIGN', 'price' => '9,000 tk', 'slug' => 'web-design-development-training', 'icon' => 'fas fa-desktop',
                     'lines' => ['Training on Web Development', 'Training duration: 2 months', 'Number of Session: 14 (3 Hours)']],
                    ['title' => 'CORE PHP', 'price' => '15,000 tk', 'slug' => 'wordpress-training', 'icon' => 'fab fa-wordpress',
                     'lines' => ['Training on WORDPRESS', 'Training duration: 2 months', 'Number of Session: 14 (3 Hours)']],
                    ['title' => 'PHP FRAMEWORK', 'price' => '9,000 tk', 'slug' => 'php-codeigniter-training', 'icon' => 'fas fa-code',
                     'lines' => ['Training on Codeigniter', 'Training duration: 2 months', 'Number of Session: 14 (3 Hours)']],
                ]],
            ],
        ],

        'web-design-development-training' => [
            'title' => 'Web Design & Development Training', 'subtitle' => 'With Our Specialized Trainers', 'parent' => 'training',
            'classic' => true,
            'blocks' => [
                ['type' => 'heading', 'small' => 'Web Design & Development Training', 'highlight' => 'New Batches', 'rest' => 'is from January'],
                ['type' => 'syllabus', 'title' => 'Web Design & Development Courses', 'modules' => [
                    ['title' => 'HTML Coding', 'items' => ['Creating a HTML page', 'HTML Tags', 'Paragraph & Text Formatting', 'Lists', 'Horizontal Ruling lines', 'HTML Color', 'Background Color', 'Specifying Font Information', 'Formatting Tags']],
                    ['title' => 'HTML Review and Basics', 'items' => ['HTML Elements', 'HTML Attributes', 'HTML Headings', 'HTML Paragraphs', 'HTML Hyper links', 'HTML Table', 'Table & Data Alignment Options', 'Table Cell Spacing & Padding', 'Changing Table Height & Width of Table Elements', 'Links', 'Anchor Tag', 'HTML Lists & Blocks', 'HTML Forms & Media']],
                    ['title' => 'HTML Advanced', 'items' => ['HTML Layout', 'HTML Form', 'Form Overview', 'Marquee Tag', 'HTML Iframes', 'Create Interactive Button', 'List Background Using Images', 'Make menu Button Using HTML code & Image', 'HTML bdo tag', 'HTML span tag']],
                    ['title' => 'Creative Artwork with HTML5', 'items' => ['HTML5 Basics', 'HTML5 Intro', 'HTML5 New Elements', 'HTML5 Semantic', 'HTML5 Input Types', 'HTML5 Form Elements', 'HTML5 Form Attributes', 'HTML5 Media', 'HTML5 Video', 'HTML5 Audio']],
                    ['title' => 'CSS Review and Basics', 'note' => 'The Inheritance', 'items' => ['Introduction to CSS', 'External Style Sheet', 'Internal Style Sheet', 'Inline Style', 'Multiple Style Sheet', 'CSS Syntax', 'CSS Id & Class', 'CSS Selectors', 'CSS1 vs CSS2 vs CSS3', 'The Cascade & Styling', '', 'The letter-spacing Property', 'The word-spacing Property', 'Text Align Property', 'Line Height Property', 'Background-URL', 'Background-Position', 'Background-Repeat', 'Specificity & Validating your CSS']],
                    ['title' => 'Building Layout with CSS', 'items' => ['CSS Box Model', '2 Column Layout', '3 Column Layout', 'CSS Border, Outline, Margin & Padding']],
                    ['title' => 'CSS Advanced', 'items' => ['CSS Floating & Positioning', 'CSS Dimension & Display', 'CSS Align, Pseudo-class, Pseudo-element &Navigation Bar', 'CSS Image Gallery, Opacity, Sprites &Media Types']],
                    ['title' => 'Creative Artwork with CSS3', 'items' => ['CSS3 Round Corners', 'CSS3 Font-face', 'CSS3 Transparency and Semi-transparency', 'CSS3 Box Shadow & Text Shadow', 'CSS3 Transitions, Transform & Gradient']],
                    ['title' => 'JavaScript & Jquery', 'items' => ['Introduction to Java Scripting', 'Client and Server side scripting', 'JavaScript inserted into HTML pages, can be executed by all modern web browsers.', 'JavaScript is easy to learn.', 'JavaScript Variable', 'Basic Funtion', 'JavaScript Loop', 'Operators', 'Form Validation', 'JavaScript Slide Customization']],
                    ['title' => 'PSD to HTML Convert', 'items' => ['PSD to HTML Convert']],
                    ['title' => 'A live project with Layout building with validations', 'items' => ['Project Overview', 'Layout Planing', 'CSS Optimization', 'Final Build Up', 'Project Summary', 'Live Web Designing Project']],
                    ['title' => 'PHP Statement & Loop', 'items' => ['Conditional Statements', 'if (…else) statement', 'Switch statements', 'Loop', 'For statement', 'For each statement', 'While statement', 'Do While statement']],
                    ['title' => 'Array, Functions, Get & Post Variable', 'items' => ['Arrays', 'PHP Functions', 'Get & Post Variable', 'Include and Require Once.']],
                    ['title' => 'File Operations', 'items' => ['deleting file', 'Uploading files.', 'Downloading files']],
                    ['title' => 'Session', 'items' => ['Register session variable', 'Creating a cookie.']],
                    ['title' => 'Email Handling', 'items' => ['Header, Subject, From, Message', 'Send email to a mail address', 'Additional Header Advanced Level']],
                    ['title' => 'Database & Query', 'items' => ['General Concept of Database', 'Database Architecture', 'Creating a Database', 'Creating a Table', 'Data type', 'Database relationship']],
                    ['title' => 'Advanced Database & Query', 'items' => ['Mysql Select', 'Mysql Insert', 'Mysql Where', 'Mysql Orderby', 'Mysql Update', 'Mysql Delete']],
                    ['title' => 'Advanced Database & Query', 'items' => ['Designing Web Database', 'Tables', 'Mysql Function', 'Mysql query']],
                    ['title' => 'Project', 'items' => ['Project , Review & Exam']],
                    ['title' => 'COUNSELLING', 'items' => []],
                ]],
            ],
        ],

        'wordpress-training' => [
            'title' => 'WordPress Training', 'subtitle' => 'With Our Specialized Trainers.', 'parent' => 'training',
            'blocks' => [
                ['type' => 'text', 'lead' => 'Training on WordPress.', 'body' => ['Duration: 2 months, 14 sessions of 3 hours. Admission is going on for new batches.']],
                ['type' => 'cta', 'text' => 'Want to join the next batch?'],
            ],
        ],

        'php-codeigniter-training' => [
            'title' => 'Raw PHP & CodeIgniter Training', 'subtitle' => 'With Our Specialized Trainers.', 'parent' => 'training',
            'blocks' => [
                ['type' => 'text', 'lead' => 'Training on Core PHP & CodeIgniter.', 'body' => ['Duration: 2 months, 14 sessions of 3 hours. Admission is going on for new batches.']],
                ['type' => 'cta', 'text' => 'Want to join the next batch?'],
            ],
        ],

        /* ----- Others ----- */
        'payment-method' => [
            'title' => 'Payment Method', 'subtitle' => 'Our Super Easy Payment Method',
            'classic' => true,
            'blocks' => [
                ['type' => 'payment'],
            ],
        ],

        'find-a-job' => [
            'title' => 'Find a Job', 'subtitle' => 'Apply for a job in our company and enjoy working with us',
            'classic' => true,
            'crumb' => true,
            'banner' => 'career-banner.jpg', // optional: public/welcome/baseit/career-banner.jpg
            'blocks' => [
                ['type' => 'career'],
            ],
        ],

        'contact-us' => [
            'title' => 'Contact Us', 'subtitle' => 'Find us here',
            'classic' => true,
            'blocks' => [
                ['type' => 'contact'],
            ],
        ],
    ],

    // Old URLs that should redirect to a page above
    'redirects' => [
        'web-design-and-development' => 'web-design-development-training',
        'my-account'                 => 'login',
    ],
];
