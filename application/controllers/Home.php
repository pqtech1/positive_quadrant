<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('email_helper');
        $this->load->library('form_validation');

        $this->load->helper('security');
        $this->load->library('upload');
        $this->load->database();
        $this->load->model('home_model'); // Load the model here
        $this->load->driver('cache', array('adapter' => 'file', 'backup' => 'dummy'));
         $this->limit_requests();
        //  $this->output->enable_profiler(TRUE);
    }
        private function limit_requests()
{
    $ip = $this->input->ip_address();
    $current_time = time();

        // Get request count from session
    $data = $this->session->userdata('request_limit');
    $request_data = isset($data) ? $data : ['count' => 0, 'time' => $current_time];

        // Reset counter after 1 minute
    if (($current_time - $request_data['time']) > 5) {
        $request_data = ['count' => 1, 'time' => $current_time];
    } else {
        $request_data['count']++;
    }

        if ($request_data['count'] > 500) {  // e.g. more than 100 requests/minute
        show_error('Too many requests. Try again later.', 429);
        exit;
    }

        $this->session->set_userdata('request_limit', $request_data);
}

    public function clear_all_cache()
    {
        // Clear all application cache
        $this->cache->clean();

        // Optionally, clear page cache as well (if you're using output caching)
        $this->output->delete_cache();

        // Redirect to some page after clearing cache
        redirect('/'); // You can redirect to any page you prefer
    }



public function sitemap()
{
    header("Content-Type: application/xml; charset=utf-8");

    // Static pages
    $urls = [
        base_url(),
        base_url('about-us'),
        base_url('contact-us'),
        base_url('projects'),
        base_url('careers'),
        base_url('internship-program'),
    ];

    // Services pages
    $services = [
        'web-development',
        'seo',
        'mobile-development',
        'web-design',
        'machine-learning',
        'e-commerce',
        'managed-hosting',
        'website-maintainance',
        'search-engine-maintenance',
        'web-application',
        'iot',
        'it-development',
        'it-consultancy',
        'software-products',
        'it-training-and-placement',
    ];

    foreach ($services as $service) {
        $urls[] = base_url($service);
    }

    // Hire pages
    $hirePages = [
        'flutter-developer',
        'react-native-developer',
        'android-developer',
        'ios-developer',
        'swift-developer',
        'kotlin-developer',
        'xamarin-developer',
        'ionic-developer',
        'data-analyst',
        'angularjs-developer',
        'reactjs-developer',
        'vue.js-developer',
        'mean-stack-developer',
        'mern-stack-developer',
        'full-stack-developer',
        'nodejs-developer',
        'java-developer',
        'php-developer',
        'laravel-developer',
        'python-developer',
        'spring-boot-developer',
        'asp.net-developer',
        'golang-developer',
        'django-developer',
        'ror-developer',
        'flutterflow-developer',
        'flask-developer',
        'codeigniter-developer',
        'automation-tester',
        'aws-cloud-management-developer',
        'graphql-developers',
        'manual-software-tester',
        'meteor-developer',
        'microsoft-power-bi-developers',
        'javascript-developer',
        'salesforce-developer',
        'symfony-developer',
        'ui-ux-designer',
        'vapt-developer',
        'wordpress-developer',
        'ai-developer',
        'machine-learning-engineers',
        'devops-engineer',
        'ci-cd-developers'
    ];

    foreach ($hirePages as $hire) {
        $urls[] = base_url('hire-'.$hire);
    }

    // Output XML
    echo '<?xml version="1.0" encoding="UTF-8"?>';
    echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

    foreach ($urls as $url) {
        echo '<url>';
        echo '<loc>'.$url.'</loc>';
        echo '<changefreq>weekly</changefreq>';
        echo '<priority>0.8</priority>';
        echo '</url>';
    }

    echo '</urlset>';
}




    public function index()
    {
        $cachedData = $this->cache->get('homepage_cache');

        if ($cachedData) {
            $data = $cachedData;
        } else {
            $data['home'] = $this->home_model->home();
            $data['about'] = $this->home_model->about_home();
            $data['client'] = $this->home_model->client(6);
            $data['workshop'] = $this->home_model->workshop();

            // Fetching hire categories and filtering based on isActive value
            $hire_categories = $this->home_model->get_categories_with_tech_names();

            foreach ($hire_categories as $category => $techs) {
                foreach ($techs as $key => $tech) {
                    $isActive = $this->db
                        ->select('isActive')
                        ->from('hire_details')
                        ->where('id', $tech['id'])
                        ->get()
                        ->row('isActive');

                    if ($isActive != 1) {
                        unset($hire_categories[$category][$key]);
                    }
                }

                if (empty($hire_categories[$category])) {
                    unset($hire_categories[$category]);
                }
            }

            $data['hire_categories'] = $hire_categories;
            $data['testimonials'] = $this->db->select('*')->from('testimonials')->get()->result_array();
            $data['recently_placed'] = $this->db->select('*')->from('recently_placed')->get()->result_array();
            $data['partners'] = $this->db->select('*')->from('our_partner')->get()->result_array();
            $data['clients'] = $this->db->select('*')->from('client')->get()->result_array();
            
            
            $data['team_members'] = $this->home->get_team_members();
               



            // ✅ SEO Meta Information
            $data['title'] = 'Positive Quadrant Technologies | IT Solutions in Mumbai';
            $data['description'] = 'Top IT solutions company in Mumbai, Thane & Ambernath. We provide affordable software development for real estate, pharma, banking & e-commerce sectors.';
            $data['keywords'] = 'positive quadrant technologies llp,positive quadrant ,positive quadrant technologies llp reviews,positive tech,web application development,web development in mumbai,web development company in mumbai,mobile app development,it companies in mumbai for internship,web design company in mumbai,software companies in mumbai,software development,software development company,software development companies in mumbai,software development company in mumbai,software development companies near me,mobile application development';
            $data['author'] = 'Positive Quadrant Technologies LLP';

            // Cache it for 1 hour
            $this->cache->save('homepage_cache', $data, 3600);
        }

        // Load views
        $this->load->view('header', $data);
        $this->load->view('index', $data);
        $this->load->view('footer');
    }









    public function about()
    {
        // Load cache driver
        $this->load->driver('cache', array('adapter' => 'file')); // Use 'memcached' or 'redis' for better performance

        // Check if cached data exists
        $cachedData = $this->cache->get('about_page_cache');

        if ($cachedData) {
            $data = $cachedData;
        } else {
            // Fetch fresh data
            $data['about'] = $this->home->about();
            $data['partner'] = $this->home->partners();
            $data['portfolio'] = $this->home->portfolio();
            $data['hire_categories'] = $this->home_model->get_categories_with_tech_names();

            $data['partners'] = $this->db->select('*')->from('our_partner')->get()->result_array();
            $data['clients'] = $this->db->select('*')->from('client')->get()->result_array();

            $data['title'] = 'About Positive Quadrant Technologies LLP | IT Solutions, Software, Mumbai Team';
            $data['description'] = 'Learn about Positive Quadrant Technologies LLP, top IT company in Mumbai for software development, digital solutions, real estate, pharma, banking, ecommerce, public sector, expert IT team, vision and mission.';
            $data['keywords'] = 'positive quadrant technologies, IT solutions Mumbai, software development company, digital services Mumbai, banking IT solutions, pharma software, ecommerce IT, public sector IT, Mumbai technology team, company vision mission';
            $data['author'] = 'Positive Quadrant Technologies LLP';

            // Cache for 1 hour
            $this->cache->save('about_page_cache', $data, 3600);
        }
        $data['team_members'] = $this->home->get_team_members();
        // Load views with data
        $this->load->view('header', $data);
        $this->load->view('about', $data);
        $this->load->view('footer');
    }



    public function service()
    {
        // Check if cached data exists
        if (!$data['hire_categories'] = $this->cache->get('hire_categories')) {
            $data['hire_categories'] = $this->home_model->get_categories_with_tech_names();
            $this->cache->save('hire_categories', $data['hire_categories'], 600); // Cache for 10 minutes
        }

        // ✅ SEO Meta Information for Services Page
        $data['title'] = 'IT Services Mumbai | Software Development, Mobile App, Web & Digital Solutions - Positive Quadrant LLP';
        $data['description'] = 'Explore leading IT services in Mumbai by Positive Quadrant Technologies LLP: software development, web development, mobile app development, digital transformation, enterprise software, cloud computing, AI automation, IT consulting, custom software solutions, SaaS products, and tech support.';
        $data['keywords'] = 'IT services Mumbai, software development, mobile app development, web development, digital services Mumbai, enterprise software solutions, cloud computing, AI automation, IT consulting Mumbai, custom software solutions, SaaS products, tech support services, Positive Quadrant Technologies, software company Mumbai, digital transformation services, technology solutions Mumbai';
        $data['author'] = 'Positive Quadrant Technologies LLP';

        // Load views
        $this->load->view('header', $data);
        $this->load->view('services', $data);
        $this->load->view('footer');
    }

    public function WebDevelopment()
    {
        // Cache hiring categories if not already cached
        if (!$data['hire_categories'] = $this->cache->get('hire_categories')) {
            $data['hire_categories'] = $this->home_model->get_categories_with_tech_names();
            $this->cache->save('hire_categories', $data['hire_categories'], 600); // 10 minutes
        }

        // ✅ Dynamic SEO Meta Info
        $data['title'] = 'Web Development Company in Mumbai | Positive Quadrant Technologies LLP';
        $data['description'] = 'Looking for professional web development in Mumbai? Positive Quadrant Technologies LLP offers affordable, custom web development services including responsive websites, e-commerce platforms, web applications, UI/UX design, and SEO-friendly solutions tailored to your business needs.';
       $data['keywords'] = 'web development, web development company, custom websites, web design, software development, mobile app development, IT company, UI UX design, e-commerce development, PHP development, Laravel development, React JS development, Node JS development, full stack development, digital transformation, cloud solutions, enterprise software, Android app development, iOS app development, SaaS development, web portal development, technology consulting in Mumbai';

        $data['author'] = 'Positive Quadrant Technologies LLP';

        // Load views
        $this->load->view('header', $data);
        $this->load->view('web-development', $data);
        $this->load->view('footer');
    }

    public function SEO()
    {
        // Cache hiring categories if not already cached
        if (!$data['hire_categories'] = $this->cache->get('hire_categories')) {
            $data['hire_categories'] = $this->home_model->get_categories_with_tech_names();
            $this->cache->save('hire_categories', $data['hire_categories'], 600); // 10 minutes
        }

        // ✅ Dynamic SEO Meta Info
        $data['title'] = 'SEO Company in Mumbai | Positive Quadrant Technologies';
        $data['description'] = 'Top SEO company in Mumbai for keyword ranking, on-page & off-page SEO. Grow traffic and leads with Positive Quadrant Technologies LLP.';
        $data['keywords'] = 'seo company mumbai, seo services mumbai, best seo agency mumbai, digital marketing mumbai, search engine optimization mumbai';
        $data['author'] = 'Positive Quadrant Technologies LLP';

        // Load views
        $this->load->view('header', $data);
        $this->load->view('seo', $data);
        $this->load->view('footer');
    }

    public function MobileDevelopment()
    {
        // Cache hiring categories if not already cached
        if (!$data['hire_categories'] = $this->cache->get('hire_categories')) {
            $data['hire_categories'] = $this->home_model->get_categories_with_tech_names();
            $this->cache->save('hire_categories', $data['hire_categories'], 600); // 10 minutes
        }

        // ✅ Dynamic SEO Meta Info
        $data['title'] = 'Mobile App Development Company in Mumbai | Positive Quadrant';
        $data['description'] = 'Top mobile app development company in Mumbai building custom Android & iOS apps. Get scalable, user-friendly, and innovative mobile solutions.';
        $data['keywords'] = 'mobile app development mumbai, android app development, ios app developers mumbai, react native development, flutter app development, hybrid app development, cross platform app development, mobile ui ux design, enterprise mobile solutions';
        $data['author'] = 'Positive Quadrant Technologies LLP';

        // Load views
        $this->load->view('header', $data);
        $this->load->view('mobile-development', $data);
        $this->load->view('footer');
    }


    public function WebDesign()
    {
        // Cache hiring categories if not already cached
        if (!$data['hire_categories'] = $this->cache->get('hire_categories')) {
            $data['hire_categories'] = $this->home_model->get_categories_with_tech_names();
            $this->cache->save('hire_categories', $data['hire_categories'], 600); // 10 minutes
        }

       // ✅ Dynamic SEO Meta Info
        $data['title'] = 'Web Design Company in Mumbai | Positive Quadrant';
        $data['description'] = 'Professional web design company in Mumbai offering creative, responsive, and user-friendly websites. Transform your online presence with Positive Quadrant.';
        $data['keywords'] = 'web design mumbai, web development, website design company mumbai, creative web design, responsive web design, custom website design, ecommerce web design, wordpress web design, ui ux design, mobile friendly web design, website redesign, full stack web development';
        $data['author'] = 'Positive Quadrant Technologies LLP';

        // Load views
        $this->load->view('header', $data);
        $this->load->view('web-design', $data);
        $this->load->view('footer');
    }

    public function MachineLearning()
    {
        // Cache hiring categories if not already cached
        if (!$data['hire_categories'] = $this->cache->get('hire_categories')) {
            $data['hire_categories'] = $this->home_model->get_categories_with_tech_names();
            $this->cache->save('hire_categories', $data['hire_categories'], 600); // 10 minutes
        }

        // ✅ Dynamic SEO Meta Info
        $data['title'] = 'Machine Learning Company in Mumbai | Positive Quadrant';
        $data['description'] = 'Leading machine learning company in Mumbai offering AI solutions, predictive analytics, and automation services to boost business efficiency and growth.';
        $data['keywords'] = 'machine learning services mumbai,machine learning services thane, ai solutions, machine learning development, deep learning, neural networks, predictive analytics, natural language processing, computer vision, ai consulting, data science solutions, automation services, ai software development, machine learning applications, artificial intelligence company mumbai';
        $data['author'] = 'Positive Quadrant Technologies LLP';


        // Load views
        $this->load->view('header', $data);
        $this->load->view('machine-learning', $data);
        $this->load->view('footer');
    }

    public function ECommerce()
    {
        // Cache hiring categories if not already cached
        if (!$data['hire_categories'] = $this->cache->get('hire_categories')) {
            $data['hire_categories'] = $this->home_model->get_categories_with_tech_names();
            $this->cache->save('hire_categories', $data['hire_categories'], 600); // 10 minutes
        }

        // ✅ Dynamic SEO Meta Info
        $data['title'] = 'E-Commerce Development Company in Mumbai | Positive Quadrant';
        $data['description'] = 'Custom e-commerce development company in Mumbai, Thane & Ambernath. Positive Quadrant delivers scalable online store solutions to grow your business.';
        $data['keywords'] = 'e-commerce development mumbai, ecommerce development thane, ecommerce development ambernath, online store development, ecommerce website development, ecommerce solutions mumbai, shopping cart development, woocommerce development, magento development, shopify development, custom ecommerce solutions, payment gateway integration, mobile commerce, b2b ecommerce, b2c ecommerce, ecommerce website design, multi channel ecommerce';
        $data['author'] = 'Positive Quadrant Technologies LLP';

        // Load views
        $this->load->view('header', $data);
        $this->load->view('e-commerce', $data);
        $this->load->view('footer');
    }

    public function ManagedHosting()
    {
        // Cache hiring categories if not already cached
        if (!$data['hire_categories'] = $this->cache->get('hire_categories')) {
            $data['hire_categories'] = $this->home_model->get_categories_with_tech_names();
            $this->cache->save('hire_categories', $data['hire_categories'], 600); // 10 minutes
        }

        // ✅ Dynamic SEO Meta Info
       $data['title'] = 'Managed Hosting Company in Mumbai | Positive Quadrant';
        $data['description'] = 'Secure and reliable managed hosting company in Mumbai offering cloud, VPS, and dedicated hosting solutions. Scalable hosting services tailored for your business.';
        $data['keywords'] = 'managed hosting mumbai, hosting services mumbai, dedicated server hosting, cloud hosting mumbai, managed cloud services, vps hosting mumbai, shared hosting, private cloud hosting, server management, website hosting, cloud infrastructure, scalable hosting services, enterprise hosting, secure hosting solutions, high performance hosting, cloud server hosting';
        $data['author'] = 'Positive Quadrant Technologies LLP';


        // Load views
        $this->load->view('header', $data);
        $this->load->view('managed-hosting', $data);
        $this->load->view('footer');
    }

    public function WebsiteMaintainance()
    {
        // Cache hiring categories if not already cached
        if (!$data['hire_categories'] = $this->cache->get('hire_categories')) {
            $data['hire_categories'] = $this->home_model->get_categories_with_tech_names();
            $this->cache->save('hire_categories', $data['hire_categories'], 600); // 10 minutes
        }

        // ✅ Dynamic SEO Meta Info
        $data['title'] = 'Website Maintenance Company in Mumbai, Thane & Ambernath | Positive Quadrant';
        $data['description'] = 'Reliable website maintenance company in Mumbai, Thane & Ambernath offering updates, security, backups, and performance monitoring to keep your website running smoothly.';
        $data['keywords'] = 'website maintenance mumbai, website maintenance thane, website maintenance ambernath, web maintenance services, website support services, website upkeep mumbai, site maintenance solutions, website management, site optimization, website security mumbai, website security thane, website security ambernath, wordpress maintenance, cms maintenance, performance monitoring, website backup services, bug fixes, ongoing website support';
        $data['author'] = 'Positive Quadrant Technologies LLP';

        // Load views
        $this->load->view('header', $data);
        $this->load->view('website-maintainance', $data);
        $this->load->view('footer');
    }

    public function SearchEngineMaintenance()
    {
        // Cache hiring categories if not already cached
        if (!$data['hire_categories'] = $this->cache->get('hire_categories')) {
            $data['hire_categories'] = $this->home_model->get_categories_with_tech_names();
            $this->cache->save('hire_categories', $data['hire_categories'], 600); // 10 minutes
        }

        // ✅ Dynamic SEO Meta Info
       $data['title'] = 'Search Engine Maintenance Company in Mumbai, Thane & Ambernath | Positive Quadrant';
       $data['description'] = 'Expert search engine maintenance company in Mumbai, Thane & Ambernath. We provide SEO audits, on-page & off-page optimization, and strategies to boost your rankings.';
       $data['keywords'] = 'search engine maintenance mumbai, search engine maintenance thane, search engine maintenance ambernath, seo maintenance, seo services mumbai, seo audits, seo strategy, on-page seo, off-page seo, technical seo, keyword research, link building, local seo, seo analysis, content optimization, organic search improvement, seo management services';
       $data['author'] = 'Positive Quadrant Technologies LLP';


        // Load views
        $this->load->view('header', $data);
        $this->load->view('search-engine-maintenance', $data);
        $this->load->view('footer');
    }

    public function WebApplication()
    {
        // Cache hiring categories if not already cached
        if (!$data['hire_categories'] = $this->cache->get('hire_categories')) {
            $data['hire_categories'] = $this->home_model->get_categories_with_tech_names();
            $this->cache->save('hire_categories', $data['hire_categories'], 600); // 10 minutes
        }

        // ✅ Dynamic SEO Meta Info
      $data['title'] = 'Web Application Development Company in Mumbai, Thane & Ambernath | Positive Quadrant';
    $data['description'] = 'Custom web application development company in Mumbai, Thane & Ambernath. We deliver scalable, innovative, and secure web app solutions for businesses of all sizes.';
    $data['keywords'] = 'web application development mumbai, web application development thane, web application development ambernath, custom web applications, web app development services, enterprise web applications, saas development, cloud-based applications, progressive web apps, pwa development, full stack web development, backend development, frontend development, api development, web application design, custom software solutions, web app solutions';
    $data['author'] = 'Positive Quadrant Technologies LLP';


        // Load views
        $this->load->view('header', $data);
        $this->load->view('web-application', $data);
        $this->load->view('footer');
    }

    public function IOT()
    {
        // Cache hiring categories if not already cached
        if (!$data['hire_categories'] = $this->cache->get('hire_categories')) {
            $data['hire_categories'] = $this->home_model->get_categories_with_tech_names();
            $this->cache->save('hire_categories', $data['hire_categories'], 600); // 10 minutes
        }

        // ✅ Dynamic SEO Meta Info
       $data['title'] = 'IoT Solutions Company in Mumbai, Thane & Ambernath | Positive Quadrant';
$data['description'] = 'Innovative IoT solutions company in Mumbai, Thane & Ambernath. We deliver smart automation, connected devices, and industrial IoT services to enhance business efficiency.';
$data['keywords'] = 'iot solutions mumbai, iot solutions thane, iot solutions ambernath, internet of things, smart devices, iot services, automation solutions, iot development, connected devices, industrial iot, iot consulting, iot platforms, sensor integration, iot applications, smart technology, iot architecture, cloud based iot solutions, real time data processing';
$data['author'] = 'Positive Quadrant Technologies LLP';


        // Load views
        $this->load->view('header', $data);
        $this->load->view('iot', $data);
        $this->load->view('footer');
    }


    public function technology()
    {
        // Cache technologies if not already cached
        if (!$data['technologies'] = $this->cache->get('technologies')) {
            $query = $this->db->get('technology');
            $data['technologies'] = $query->result_array();
            $this->cache->save('technologies', $data['technologies'], 600); // 10 minutes
        }

        // Cache hiring categories if not already cached
        if (!$data['hire_categories'] = $this->cache->get('hire_categories')) {
            $data['hire_categories'] = $this->home_model->get_categories_with_tech_names();
            $this->cache->save('hire_categories', $data['hire_categories'], 600); // 10 minutes
        }

        // ✅ Dynamic SEO Meta Info
        $data['title'] = 'Technology Solutions & Innovations for Business Growth | Positive Quadrant';
$data['description'] = 'Discover innovative technology solutions with Positive Quadrant. We deliver IT consulting, cloud, and digital transformation services to boost efficiency and growth.';
$data['keywords'] = 'technology solutions, innovative technologies, IT solutions, tech innovations, business technology, digital transformation, IT consulting, enterprise IT solutions, cloud technology, software solutions, technology consulting services, business technology solutions, IT support services, technology infrastructure, IT strategy, custom technology solutions, technology integration';
$data['author'] = 'Positive Quadrant Technologies LLP';


        // Load views
        $this->load->view('header', $data);
        $this->load->view('technology', $data);
        $this->load->view('footer');
    }


    public function industry()
    {
        // Cache hiring categories if not already cached
        if (!$data['hire_categories'] = $this->cache->get('hire_categories')) {
            $data['hire_categories'] = $this->home_model->get_categories_with_tech_names();
            $this->cache->save('hire_categories', $data['hire_categories'], 600); // 10 minutes
        }

        // Cache industries if not already cached
        if (!$data['industries'] = $this->cache->get('industries')) {
            $query = $this->db->get('industries');
            $data['industries'] = $query->result_array();
            $this->cache->save('industries', $data['industries'], 600); // 10 minutes
        }

        // ✅ Dynamic SEO Meta Info
       $data['title'] = 'Industry Solutions & Services for Business Growth | Positive Quadrant';
$data['description'] = 'Tailored industry solutions and services by Positive Quadrant. We help businesses in manufacturing, supply chain, and other sectors achieve efficiency and growth.';
$data['keywords'] = 'industry solutions, industry services, business solutions for industries, industrial IT services, sector specific solutions, industry consulting, industrial automation, enterprise solutions, business process optimization, manufacturing IT solutions, supply chain solutions, industry 4.0 solutions, industrial software, b2b industry services, digital solutions for industries';
$data['author'] = 'Positive Quadrant Technologies LLP';


        // Load views
        $this->load->view('header', $data);
        $this->load->view('industries', $data);
        $this->load->view('footer');
    }


    public function SoftwareProduct()
    {
        // Cache hiring categories if not already cached
        if (!$data['hire_categories'] = $this->cache->get('hire_categories')) {
            $data['hire_categories'] = $this->home_model->get_categories_with_tech_names();
            $this->cache->save('hire_categories', $data['hire_categories'], 600); // 10 minutes
        }

        // Cache software products if not already cached
        if (!$data['software_products'] = $this->cache->get('software_products')) {
            $query = $this->db->get('software_product');
            $data['software_products'] = $query->result_array();
            $this->cache->save('software_products', $data['software_products'], 600); // 10 minutes
        }

        // ✅ Dynamic SEO Meta Info
        $data['title'] = 'Software Product Development Services | Positive Quadrant Technologies LLP';
       $data['description'] = 'Expert software product development services to build scalable, secure, and innovative solutions. Positive Quadrant delivers custom software tailored to your business needs.';
$data['keywords'] = 'software product development, custom software solutions, software development services, enterprise software products, saas product development, software applications, custom enterprise solutions, software engineering services, business process automation, software consulting, software design and development, software architecture, product lifecycle management, cloud software solutions';
$data['author'] = 'Positive Quadrant Technologies LLP';
        // Load views
        $this->load->view('header', $data);
        $this->load->view('softwareProduct', $data);
        $this->load->view('footer');
    }


    public function Internship()
    {
        // Cache hiring categories if not already cached
        if (!$data['hire_categories'] = $this->cache->get('hire_categories')) {
            $data['hire_categories'] = $this->home_model->get_categories_with_tech_names();
            $this->cache->save('hire_categories', $data['hire_categories'], 600); // 10 minutes
        }

        // ✅ Dynamic SEO Meta Info
        $data['title'] = 'Internship Opportunities at Positive Quadrant Technologies LLP';
        $data['description'] = 'Apply for exciting internships at Positive Quadrant Technologies LLP. Gain hands-on experience in IT, software development, and digital marketing to kickstart your career.';
$data['keywords'] = 'internship opportunities, IT internships, software development internships, digital marketing internships, technology internships, student internships, paid internships, summer internships, engineering internships, internships for freshers, career opportunities for students, internship programs';
$data['author'] = 'Positive Quadrant Technologies LLP';


        // Load views
        $this->load->view('header', $data);
        $this->load->view('internship');
        $this->load->view('footer');
    }



    public function Hire($slug_url = null)
    {
        $cache_key = 'hire_data_' . (isset($slug_url) ? $slug_url : 'default');

        // Ensure $data is always an array
        $data = $this->cache->get($cache_key);
        if (!$data || !is_array($data)) {  // If cache is empty or not an array
            $data = []; // Initialize as empty array

            $data['home'] = $this->home_model->home();
            $data['about'] = $this->home_model->about_home();
            $data['client'] = $this->home_model->client(6);
            $data['workshop'] = $this->home_model->workshop();
            $data['hire_categories'] = $this->home_model->get_categories_with_tech_names();

            if ($slug_url) {
                $hire_id = $this->home_model->get_tech_id_by_slug($slug_url);
                if ($hire_id) {
                    $data['hire_details'] = $this->home_model->get_tech_details_by_id($hire_id);
                    $data['tech_details'] = $this->home_model->get_tech_details_with_values_by_hire_id($hire_id);
                } else {
                    show_404();
                    return;
                }
            }

            $this->cache->save($cache_key, $data, 300);
        }

        $this->output->cache(10);

        // ✅ Dynamic SEO Meta Info
        $data['title'] = 'Hire Technology Experts | Positive Quadrant Technologies LLP';
       $data['description'] = 'Hire top IT professionals, software developers, and tech experts with Positive Quadrant Technologies LLP. Flexible IT staffing and recruitment solutions for your business needs.';
$data['keywords'] = 'hire technology experts, hire it professionals, hire software developers, hire tech talent, it staffing services, software development recruitment, tech talent acquisition, it recruitment services, technology recruitment agency, hire web developers, software engineering recruitment, it consultants hiring, tech team outsourcing, freelance tech developers, it workforce solutions';
$data['author'] = 'Positive Quadrant Technologies LLP';

        // Load views
        $this->load->view('header', $data);
        $this->load->view('hire', $data);
        $this->load->view('footer');
    }



    public function contact()
    {
        $cache_key = 'contact_data';

        // Ensure $data is always an array
        $data = $this->cache->get($cache_key);
        if (!$data || !is_array($data)) { // Fix: Check if cache is empty or invalid
            $data = []; // Initialize as an empty array

            $data['hire_categories'] = $this->home_model->get_categories_with_tech_names();

            $this->cache->save($cache_key, $data, 300);
        }

        $this->output->cache(10);

        // ✅ Dynamic SEO Meta Info
       $data['title'] = 'Contact Positive Quadrant Technologies LLP | Tech Solutions & Support';
$data['description'] = 'Reach out to Positive Quadrant Technologies LLP for tech consultations, IT solutions, and business support. Our team is ready to assist with your technology needs.';
$data['keywords'] = 'contact us, tech solutions, contact Positive Quadrant, inquire tech services, business tech solutions, get in touch, tech service inquiry, IT services contact, technology consulting contact, reach out to Positive Quadrant, business technology services, contact technology experts, tech support inquiry, request tech consultation, inquire about software solutions';
$data['author'] = 'Positive Quadrant Technologies LLP';

        // Load views
        $this->load->view('header', $data);
        $this->load->view('contact');
        $this->load->view('footer');
    }

    public function client()
    {
        $cache_key = 'client_data';
        if (!$data = $this->cache->get($cache_key)) {
            $data['hire_categories'] = $this->home_model->get_categories_with_tech_names();
            $data['clients'] = $this->home_model->client(0);
            $this->cache->save($cache_key, $data, 300);
        }

        $this->output->cache(10);

        // ✅ Dynamic SEO Meta Info
        $data['title'] = 'Our Clients | Positive Quadrant Technologies LLP';
        $data['description'] = 'Discover the clients who trust Positive Quadrant Technologies LLP for their technology and business solutions. We provide top-tier services to a wide range of industries.';
$data['keywords'] = 'our clients, client portfolio, trusted clients, technology solutions, Positive Quadrant clients, client testimonials, customer success stories, business partnerships, client relationships, satisfied clients, corporate clients, enterprise clients, tech solutions clients, client case studies, technology partnerships';
        $data['author'] = 'Positive Quadrant Technologies LLP';

        // Load views
        $this->load->view('header', $data);
        $this->load->view('client', $data);
        $this->load->view('footer');
    }


    public function portfolio()
    {
        $cache_key = 'portfolio_data';
        if (!$data = $this->cache->get($cache_key)) {
            $data['hire_categories'] = $this->home_model->get_categories_with_tech_names();
            $this->cache->save($cache_key, $data, 300);
        }

        $this->output->cache(10);

        // ✅ Dynamic SEO Meta Info
        $data['title'] = 'Our Portfolio | Positive Quadrant Technologies LLP';
        $data['description'] = 'Explore our diverse portfolio of successful projects. Positive Quadrant Technologies LLP delivers exceptional technology and business solutions to clients worldwide.';
$data['keywords'] = 'portfolio, tech portfolio, projects, successful projects, Positive Quadrant portfolio, project showcase, completed projects, project case studies, web development portfolio, software development projects, client projects, technology project portfolio, project highlights, digital solutions portfolio, enterprise projects, innovative projects';
        $data['author'] = 'Positive Quadrant Technologies LLP';

        // Load views
        $this->load->view('header', $data);
        $this->load->view('portfolio');
        $this->load->view('footer');
    }


    public function career()
    {
        $cache_key = 'career_data';

        // Ensure $data is always an array
        $data = $this->cache->get($cache_key);
        if (!$data || !is_array($data)) {  // Fix: Check if it's false or not an array
            $data = []; // Initialize as an empty array

            $data['hire_categories'] = $this->home_model->get_categories_with_tech_names();
            $data['job_openings'] = $this->db->select('*')->from('job_openings')->get()->result_array();

            $this->cache->save($cache_key, $data, 300);
        }

        $this->output->cache(10);

        // ✅ Dynamic SEO Meta Info
        $data['title'] = 'Career Opportunities | Positive Quadrant Technologies LLP';
        $data['description'] = 'Join the team at Positive Quadrant Technologies LLP! Explore career opportunities, job openings, and learn how you can contribute to our innovative tech solutions.';
$data['keywords'] = 'career opportunities, job openings, tech jobs, Positive Quadrant careers, work with us, IT job opportunities, software development careers, technology careers, join our team, tech talent hiring, job vacancies, software engineer jobs, career in technology, IT recruitment, tech career growth, job opportunities at Positive Quadrant';
        $data['author'] = 'Positive Quadrant Technologies LLP';

        // Load views
        $this->load->view('header', $data);
        $this->load->view('career', $data);
        $this->load->view('footer');
    }


    public function submit_job_application()
    {
        $recaptchaResponse = $this->input->post('g-recaptcha-response');
        $secretKey = RECAPTCHA_SECRET_KEY;

        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = [
            'secret' => $secretKey,
            'response' => $recaptchaResponse,
            'remoteip' => $this->input->ip_address(),
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $verify = curl_exec($ch);
        curl_close($ch);

        $responseData = json_decode($verify, true);

        if (!empty($responseData['success']) && $responseData['success'] == true) {
            echo json_encode([
                'status' => 'success',
                'message' => 'reCAPTCHA verified successfully!',
                'csrf_token' => $this->security->get_csrf_hash()
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'reCAPTCHA verification failed. Please try again.',
                'csrf_token' => $this->security->get_csrf_hash()
            ]);
        }


        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('application_form');
        } else {
            $config['upload_path'] = './upload/job_applications_resume/';
            $config['allowed_types'] = 'pdf|doc|docx|jpg|jpeg|png';
            $config['max_size'] = 5000;
            $config['file_name'] = time() . '-' . $_FILES['resume']['name'];

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('resume')) {
                echo $this->upload->display_errors();
            } else {
                $upload_data = $this->upload->data();
                $resume_file = $upload_data['file_name'];

                $data = [
                    'job_id' => $this->input->post('job_id'),
                    'job_title' => $this->input->post('job_title'),
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'phone' => $this->input->post('phone'),
                    'address' => $this->input->post('address'),
                    'linkedin' => $this->input->post('linkedin'),
                    'resume' => $resume_file
                ];

                $this->db->insert('job_applications', $data);
                $this->output->delete_cache('career'); // Clear cache for the career page

                echo 'Application submitted successfully!';
            }
        }
    }




    public function development()
    {
        $this->output->cache(10); // Cache the output for 10 minutes

        $this->db->cache_on();
        $data['development'] = $this->home->development();
        $this->db->cache_off();

        $data['hire_categories'] = $this->home_model->get_categories_with_tech_names();

        // ✅ Dynamic SEO Meta Info
        $data['title'] = 'Software Development Services | Positive Quadrant Technologies LLP';
        $data['description'] = 'Discover our top-notch software development services. Positive Quadrant Technologies LLP provides custom development solutions to meet your business needs.';
$data['keywords'] = 'software development, custom software development, technology solutions, Positive Quadrant development, enterprise software development, custom software solutions, software development services, IT solutions, software engineering, application development, web application development, software consulting, software development company, business software solutions, bespoke software development';
        $data['author'] = 'Positive Quadrant Technologies LLP';

        $this->load->view('header', $data);
        $this->load->view('development', $data);
        $this->load->view('footer');
    }


    public function training()
    {
        $this->output->cache(10); // Cache the output for 10 minutes

        $this->db->cache_on();
        $data['trainings'] = $this->home->training();
        $this->db->cache_off();

        $data['hire_categories'] = $this->home_model->get_categories_with_tech_names();

        // ✅ Dynamic SEO Meta Info
        $data['title'] = 'Professional Training Programs | Positive Quadrant Technologies LLP';
        $data['description'] = 'Enhance your skills with our professional training programs. Positive Quadrant Technologies LLP offers high-quality training in various technical fields.';
$data['keywords'] = 'professional training, tech training, IT training programs, Positive Quadrant training, software development training, IT certification programs, tech skill development, programming training, corporate training, online tech courses, IT workshops, technical training services, career development programs, tech skills enhancement, technology training services';
        $data['author'] = 'Positive Quadrant Technologies LLP';

        $this->load->view('header', $data);
        $this->load->view('training', $data);
        $this->load->view('footer');
    }


    public function project()
    {
        $this->output->cache(10); // Cache the output for 10 minutes

        $this->db->cache_on();
        $data['project'] = $this->home->project();
        $this->db->cache_off();

        $data['hire_categories'] = $this->home_model->get_categories_with_tech_names();

        // ✅ Dynamic SEO Meta Info
        $data['title'] = 'Our Projects | Positive Quadrant Technologies LLP';
        $data['description'] = 'Explore our diverse range of projects at Positive Quadrant Technologies LLP. We deliver outstanding tech solutions across various industries.';
$data['keywords'] = 'projects, tech projects, Positive Quadrant projects, custom tech solutions, innovative projects, technology solutions, custom software projects, IT projects, digital transformation projects, enterprise tech solutions, software development projects, technology implementation, client projects, project portfolio, tech solutions for businesses';
        $data['author'] = 'Positive Quadrant Technologies LLP';

        $this->load->view('header', $data);
        $this->load->view('careers', $data);  // Make sure the view name is correct if this should be 'project'
        $this->load->view('footer');
    }



    public function training_details($course_slug)
    {
        // Decode the slug
        $original_cname = str_replace('-', ' ', rawurldecode($course_slug));

        // Cache key based on course name
        $cache_key = 'training_details_' . md5($original_cname);

        // Initialize data as an empty array
        $data = $this->cache->get($cache_key);

        // Check if cache exists; if not, fetch data
        if (!$data || !is_array($data)) {
            $data = []; // Ensure $data is always an array

            // Fetch course c_id
            $query = $this->db->select('c_id, cname, cdesc')
                ->from('course')
                ->where('cname', $original_cname)
                ->get();
            $course = $query->row_array();

            if (!$course) {
                log_message('error', 'Course not found with cname: ' . $original_cname);
                return redirect('Home/training');
            }

            $course_id = $course['c_id'];

            // Fetch related data
            $data['hire_categories'] = $this->home_model->get_categories_with_tech_names();
            $data['syllabus'] = $this->home->viewSyllabusByCourse($course_id);

            // Dynamic SEO Meta Info based on the course details
            $data['title'] = $course['cname'] . ' - Training Course | Positive Quadrant Technologies LLP';
            $data['description'] = 'Learn ' . $course['cname'] . ' at Positive Quadrant Technologies LLP. Our training program includes a comprehensive syllabus and hands-on experience to enhance your skills.';
$data['keywords'] = $course['cname'] . ', ' . ', ' . ', Positive Quadrant training, IT training, technology training, professional development, online courses, skill development, career advancement, technical certification, programming training, IT workshops, IT skills development, training for professionals';
            $data['author'] = 'Positive Quadrant Technologies LLP';

            // Store in cache for 30 minutes
            $this->cache->save($cache_key, $data, 1800);
        }

        // Load views only if syllabus exists
        if (!empty($data['syllabus'])) {
            $this->load->view('header', $data);
            $this->load->view('product_main', $data);
            $this->load->view('footer');
        } else {
            return redirect('Home/training');
        }
    }



    public function consultancy()
    {
        $cache_key = 'consultancy_data';

        // Check if the data is cached
        $data = $this->cache->get($cache_key);

        if (!$data) {
            $data['hire_categories'] = $this->home_model->get_categories_with_tech_names();
            $data['consultancy'] = $this->home->consultancy();

            // Cache for 30 minutes
            $this->cache->save($cache_key, $data, 1800);
        }

        // Check if consultancy data exists
        if (!empty($data['consultancy'])) {
            // Dynamic SEO Meta Info
            $data['title'] = 'Consultancy Services | Positive Quadrant Technologies LLP';
            $data['description'] = 'Explore our expert consultancy services designed to help businesses optimize their operations and achieve their goals. Learn more at Positive Quadrant Technologies LLP.';
$data['keywords'] = 'consultancy services, business consultancy, IT consultancy, Positive Quadrant consultancy, business optimization, consulting services, management consultancy, technology consulting, business strategy, digital transformation consulting, business process improvement, IT strategy consulting, enterprise consultancy, consulting for businesses, operational efficiency, corporate consulting services';
            $data['author'] = 'Positive Quadrant Technologies LLP';

            // Load views
            $this->load->view('header', $data);
            $this->load->view('consultancy', $data);
            $this->load->view('footer');
        } else {
            // If no consultancy data, redirect to consultancy page
            return redirect('Home/consultancy');
        }
    }


    public function getVenue($b_id)
    {
        $cache_key = 'venue_details_' . $b_id;

        if (!$data = $this->cache->get($cache_key)) {
            $data = $this->home->VenueDetails($b_id);
            $this->cache->save($cache_key, $data, 1800);
        }

        echo json_encode($data);
    }

    public function enform()
    {
        $res = $this->home->insertEnquiry();

        // Clear cache after inserting a new enquiry
        $this->cache->delete('enquiry_list');

        $subject = 'Enquiry From Alert Modal';
        $body = '<!DOCTYPE html><html><body><p>
    Dear<b> Admin</b></p><p>Enquiry has been made from alert modal please find details below
    </p><p>Name :<b> ' . $this->input->post('name') . '</b></p>
    <p>Email :<b> ' . $this->input->post('email') . '</b></p>
    <p>Phone :<b> ' . $this->input->post('phone') . '</b></p>
    <p>Services :<b> ' . $this->input->post('service') . '</b></p>
    <p>Message :<b> ' . $this->input->post('message') . '</b></p>';

        $recipient_email = RECEIPT_EMAIL;
        $reply_email = REPLY_EMAIL;
        $cc_email = CC_EMAIL;

        send_email($subject, $body, $recipient_email, $reply_email, $cc_email, $attachment = array());

        echo ($res) ? "true" : "false";
    }


    public function careersform()
    {
        //Check whether user upload picture
        if (!empty($_FILES['resume']['name'])) {
            $config['upload_path'] = 'upload/images/';
            $config['allowed_types'] = 'pdf|docx|png';
            $config['file_name'] = $_FILES['resume']['name'];

            //Load upload library and initialize configuration
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('resume')) {
                $uploadData = $this->upload->data();
                $picture = $uploadData['file_name'];
            } else {
                $picture = '';
            }
        } else {
            $picture = '';
        }


        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $jobtype = $this->input->post('jobtype');
        $message = $this->input->post('message');

        $data = array(
            "name" => $name,
            "email" => $email,
            "phone" => $phone,
            "jobtype" => $jobtype,
            "picture" => $picture,
            "message" => $message
        );

        $res = $this->home->career_data($data);

        //Send email notification to admin for career enquiry
        $subject = 'Career Enquiry';
        $body = '<!DOCTYPE html><html><body><p>
         Dear<b> Admin</b></p><p>Enquiry has been for career please find details is below
         </p><p>Name :<b> ' . $name . '</b></p>
         <p>Email :<b> ' . $email . '</b>
         </p><p>Phone :<b> ' . $phone . '</b>
         </p><p>Position :<b> ' . $jobtype . '</b>
         </p><p>Message :<b> ' . $message . '</b></p>';
        //<h3>PFA of resume</h3></body></html>';
        $recipient_email = RECEIPT_EMAIL;
        $reply_email = REPLY_EMAIL;
        $cc_email = CC_EMAIL;
        //$file = base_url().'upload/images/'.$picture;
        //$file = 'http://positivequadrant.in/upload/images/RESUME.docx';
        send_email($subject, $body, $recipient_email, $reply_email, $cc_email, $attachment = array());
        if ($res) {
            $this->session->set_flashdata('success_msg', 'Thank you for contacting us. We will be in touch with you very soon!');
        } else {
            $this->session->set_flashdata('error_msg', 'Some problems occured, please try again.');
        }
        return redirect(base_url() . 'careers', 'refresh');
    }

    public function caarcon()
    {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $services = $this->input->post('services');
        $data = array(
            "name" => $name,
            "email" => $email,
            "mobile" => $phone,
            "services" => $services
        );
        $res = $this->home->contactus_data($data);
        //Send email notification to admin for contact us enquiry
        $subject = 'Contact Us Enquiry';
        $body = '<!DOCTYPE html><html><body><p>
        Dear<b> Admin</b></p><p>Enquiry has been for ' . $services . ' please find details is below
        </p><p>Name :<b> ' . $name . '</b></p>
        <p>Email :<b> ' . $email . '</b></p>
        <p>Phone :<b> ' . $phone . '</b></p>
        <p>services :<b> ' . $services . '</b></p></body></html>';
        $recipient_email = RECEIPT_EMAIL;
        $reply_email = REPLY_EMAIL;
        $cc_email = CC_EMAIL;
        //$file = base_url().'upload/images/'.$picture;
        //$file = 'http://positivequadrant.in/upload/images/RESUME.docx';
        send_email($subject, $body, $recipient_email, $reply_email, $cc_email, $attachment = array());
        if ($res == 1) {
            echo "success";
        } else {
            echo "unsuccess";
        }
    }


    // function email()
    // {


    //     $to = 'uttamvishwakarma99@gmail.com';  // User email pass here
    //     $subject = 'Welcome To CodingMantra';

    //     $from = 'uttamwithitlogic@gmail.com';              // Pass here your mail id

    //     $emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc;margin: auto;border-sp	acing:0;"><tr><td style="background:#000000;padding-left:3%"><img src="http://codingmantra.co.in/assets/logo/logo.png" width="300px" vspace=10 /></td></tr>';
    //     $emailContent .= '<tr><td style="height:20px"></td></tr>';


    //     //$emailContent .= $this->input->post('message');  //   Post message available here


    //     $emailContent .= '<tr><td style="height:20px"></td></tr>';
    //     $emailContent .= "<tr><td style='background:#000000;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='http://codingmantra.co.in/' target='_blank' style='text-decoration:none;color: #60d2ff;'>www.codingmantra.co.in</a></p></td></tr></table></body></html>";



    //     // $config['protocol']    = 'smtp';
    //     // $config['smtp_host']    = 'smtp.googlemail.com';
    //     // $config['smtp_port']    = '465';
    //     // $config['smtp_timeout'] = '60';
    //     // $config['smtp_user']    = 'uttamwithitlogic@gmail.com';    //Important
    //     // $config['smtp_pass']    = 'newpassword@123';  //Important

    //     // $config['charset']    = 'utf-8';
    //     // $config['newline']    = "\r\n";
    //     // $config['mailtype'] = 'html'; // or html
    //     // $config['validation'] = TRUE; // bool whether to validate email or not 


    //     $configGmail = array();
    //     $configGmail['protocol'] = 'smtp';
    //     $configGmail['smtp_host'] = 'positivequadrant.in';
    //     $configGmail['smtp_port'] = '587';
    //     $configGmail['mailtype'] = 'html';
    //     $configGmail['charset'] = 'utf-8';
    //     $configGmail['newline'] = "\r\n";
    //     $configGmail['smtp_user'] = 'ei73pg4h9q5h';
    //     $configGmail['smtp_pass'] = 'Rajnish@123';
    //     // $configGmail['smtp_crypto']  = 'ssl';  
    //     $configGmail['wordwrap'] = TRUE;

    //     $this->email->initialize($configGmail);
    //     $this->email->set_newline("\r\n");
    //     $this->email->set_mailtype("html");
    //     $this->email->from($from);
    //     $this->email->to($to);
    //     $this->email->subject($subject);
    //     $this->email->message($emailContent);
    //     $this->email->send();
    //     echo $this->email->print_debugger();

    // }










    public function test()
    {
        error_reporting(E_ALL);
        ini_set('display_errors', '1');
        $this->load->helper('email');
        $subject = 'test mail';
        $body = 'test';
        //<h3>PFA of resume</h3></body></html>';
        $recipient_email = RECEIPT_EMAIL;
        $reply_email = REPLY_EMAIL;
        $cc_email = CC_EMAIL;
        // echo $cc_email;
        // die;
        // $cc_email = 'naimishdwivedi1307@gmail.com';

        send_email($subject, $body, $recipient_email, $reply_email, $cc_email, $attachment = array());
    }



    public function jobopenings()
    {
        // Enable caching for 10 minutes
        $this->output->cache(10);

        // Fetch hire categories (cache separately if needed)
        $data['hire_categories'] = $this->home_model->get_categories_with_tech_names();

        // Dynamic SEO Meta Info
        $data['title'] = 'Job Openings | Positive Quadrant Technologies LLP';
        $data['description'] = 'Explore the latest job openings at Positive Quadrant Technologies LLP. Join our team and be a part of a forward-thinking and innovative company.';
$data['keywords'] = 'job openings, career opportunities, Positive Quadrant careers, software jobs, IT jobs, tech jobs, hiring, technology careers, job vacancies, software engineer positions, IT recruitment, tech talent, career growth, job opportunities in tech, software development careers, tech recruitment services';
        $data['author'] = 'Positive Quadrant Technologies LLP';

        // Load views
        $this->load->view('header', $data);
        $this->load->view('jobopenings', $data);
        $this->load->view('footer');
    }


    public function testingemail()
    {
        $this->email->from('ei73pg4h9q5h@positivequadrant.in', 'Positive Quadrant');
        $this->email->to('naimishdwivedi1307@gmail.com');
        $this->email->subject('Test Email');
        $this->email->message('This is a test email, i am testing-> naimish dwivedi.');

        if ($this->email->send()) {
            echo 'Email sent successfully.';
        } else {
            echo $this->email->print_debugger(['headers', 'subject', 'body']);
        }

    }


    public function saveData()
    {
        $recaptchaResponse = $this->input->post('g-recaptcha-response');
        $secretKey = RECAPTCHA_SECRET_KEY;

        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = [
            'secret' => $secretKey,
            'response' => $recaptchaResponse,
            'remoteip' => $this->input->ip_address(),
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $verify = curl_exec($ch);
        curl_close($ch);

        $responseData = json_decode($verify, true);

        if (!empty($responseData['success']) && $responseData['success'] == true) {
            echo json_encode([
                'status' => 'success',
                'message' => 'reCAPTCHA verified successfully!',
                'csrf_token' => $this->security->get_csrf_hash()
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'reCAPTCHA verification failed. Please try again.',
                'csrf_token' => $this->security->get_csrf_hash()
            ]);
        }

        // Validation rules
        $this->form_validation->set_rules('name', 'Name', 'required|trim|min_length[3]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
        $this->form_validation->set_rules('phone', 'Phone', 'required|numeric|min_length[10]|max_length[15]');
        $this->form_validation->set_rules('services', 'Services', 'required');
        $this->form_validation->set_rules('message', 'Message', 'min_length[10]');

        if ($this->form_validation->run() == FALSE) {
            $response = [
                'status' => 'error',
                'message' => validation_errors(),
            ];
        } else {
            // Clean and validate input to avoid script or URL spam
            $name = $this->security->xss_clean($this->input->post('name'));
            $email = $this->security->xss_clean($this->input->post('email'));
            $phone = $this->security->xss_clean($this->input->post('phone'));
            $service = $this->security->xss_clean($this->input->post('services'));
            $message = $this->security->xss_clean($this->input->post('message'));

            // Block if content has scripts or URLs
            if ($this->hasMaliciousContent([$name, $email, $phone, $service, $message])) {
                $response = [
                    'status' => 'error',
                    'message' => 'Malicious content detected.',
                ];
            } else {
                $data = [
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'service' => $service,
                    'message' => $message,
                    'submission_origin'=>$submitted_from,
                    'status' => 'False',
                ];

                $this->db->insert('enquiry', $data);

                if ($this->db->affected_rows() > 0) {
                    $emailQueueData = [
                        'name' => $data['name'],
                        'email_to' => $data['email'],
                        'phone' => $data['phone'],
                        'email_subject' => $data['service'],
                        'email_message' => $data['message'],
                    ];

                    $this->db->insert('email_queue', $emailQueueData);

                    $response = [
                        'status' => 'success',
                        'message' => 'Your enquiry has been sent successfully.',
                    ];
                } else {
                    $response = [
                        'status' => 'error',
                        'message' => 'Failed to save the enquiry.',
                    ];
                }
            }
        }

        // Final response
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    // Helper function to detect malicious scripts or URLs
    private function hasMaliciousContent($inputs = [])
    {
        foreach ($inputs as $input) {
            if (
                preg_match('/<script.*?>.*?<\/script>/is', $input) ||
                preg_match('/http(s)?:\/\/[^\s]+/i', $input)
            ) {
                return true;
            }
        }
        return false;
    }



    public function processEmailQueue()
    {
        $queue = $this->db->get('email_queue')->result_array();

        foreach ($queue as $email) {
            $data = [
                'name' => $email['name'],
                'email' => $email['email_to'],
                'phone' => $email['phone'],
                'service' => $email['email_subject'],
                'message' => $email['email_message'],
            ];

            // Sending email to the admin
            $adminEmailContent = $this->load->view('admin_email', $data, TRUE);
            $this->email->set_mailtype('html');
            $this->email->clear(TRUE);
            $this->email->from('ei73pg4h9q5h@positivequadrant.in', 'Positive Quadrant Technologies LLP');
            $this->email->to(EMAIL_ADMIN_TO);
            $this->email->bcc(explode(',', EMAIL_ADMIN_BCC));
            $this->email->subject("New Enquiry Received: " . $data['service']);
            $this->email->message($adminEmailContent);

            // Attach resume if it exists
            if (!empty($email['resume'])) {
                $resumePath = $email['resume'];
                $this->email->attach($resumePath);
            }

            if (!$this->email->send()) {
                log_message('error', "Admin Email Failed (ID: {$email['id']}): " . $this->email->print_debugger(['headers', 'subject', 'body']));
                continue;
            }

            // Sending email to the user
            $userEmailContent = $this->load->view('thank_you_email', $data, TRUE);
            $this->email->set_mailtype('html');
            $this->email->clear(TRUE);
            $this->email->from('ei73pg4h9q5h@positivequadrant.in', 'Positive Quadrant Technologies LLP');
            $this->email->to($data['email']);
            $this->email->subject("Thank You for Your Enquiry");
            $this->email->message($userEmailContent);

            if (!$this->email->send()) {
                log_message('error', "User Email Failed (ID: {$email['id']}): " . $this->email->print_debugger(['headers', 'subject', 'body']));
                continue;
            }

            // Remove email from queue
            $this->db->where('id', $email['id'])->delete('email_queue');
        }
    }




    public function internshipEnquiryForm()
    {
        $recaptchaResponse = $this->input->post('g-recaptcha-response');
        $secretKey = RECAPTCHA_SECRET_KEY;

        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = [
            'secret' => $secretKey,
            'response' => $recaptchaResponse,
            'remoteip' => $this->input->ip_address(),
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $verify = curl_exec($ch);
        curl_close($ch);

        $responseData = json_decode($verify, true);

        if (!empty($responseData['success']) && $responseData['success'] == true) {
            echo json_encode([
                'status' => 'success',
                'message' => 'reCAPTCHA verified successfully!',
                'csrf_token' => $this->security->get_csrf_hash()
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'reCAPTCHA verification failed. Please try again.',
                'csrf_token' => $this->security->get_csrf_hash()
            ]);
        }

        // Only allow POST requests
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            show_error('Method Not Allowed', 405);
            return;
        }

  $submitted_from = $this->input->post('submitted_from');

        // Set validation rules with 'trim' for better cleaning
        $this->form_validation->set_rules('name', 'Name', 'required|trim|min_length[3]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required|trim|exact_length[10]|numeric');
        $this->form_validation->set_rules('whatsapp', 'WhatsApp No', 'required|trim|exact_length[10]|numeric');
        $this->form_validation->set_rules('location', 'City/Location', 'required|trim|min_length[3]');
        $this->form_validation->set_rules('Subject', 'Internship Field', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            // Return validation errors
            $response = [
                'status' => 'error',
                'message' => validation_errors('<p>', '</p>')
            ];
        } else {
            // Sanitize and clean user input
            $formData = [
                'name' => $this->security->xss_clean($this->input->post('name')),
                'email' => $this->security->xss_clean($this->input->post('email')),
                'mobile' => $this->security->xss_clean($this->input->post('mobile')),
                'whatsapp' => $this->security->xss_clean($this->input->post('whatsapp')),
                'location' => $this->security->xss_clean($this->input->post('location')),
                'subject' => $this->security->xss_clean($this->input->post('Subject')),
                'date' => $this->security->xss_clean($this->input->post('date')),
                  'submission_origin'=>$submitted_from,
                'status' => 'False'
            ];

            // Insert the data securely
            $this->db->insert('internship_enquiry_details', $formData);

            if ($this->db->affected_rows() > 0) {
                // Prepare email queue data
                $emailQueueData = [
                    'name' => $formData['name'],
                    'email_to' => $formData['email'],
                    'phone' => $formData['mobile'],
                    'email_subject' => $formData['subject'],
                    'email_message' => "Internship Enquiry Details:\n\n" .
                        "Name: {$formData['name']}\n" .
                        "Email: {$formData['email']}\n" .
                        "Mobile: {$formData['mobile']}\n" .
                        "WhatsApp: {$formData['whatsapp']}\n" .
                        "Location: {$formData['location']}\n" .
                        "Subject: {$formData['subject']}\n" .
                        "Date: {$formData['date']}",
                ];

                // Insert into email queue
                $this->db->insert('email_queue', $emailQueueData);

                // Return success response
                $response = [
                    'status' => 'success',
                    'message' => 'Your enquiry has been sent successfully.'
                ];
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Failed to send. Please try again.'
                ];
            }
        }

        // Send JSON response
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }


    public function internshipEmail($formData)
    {
        $this->load->library('email', [
            'protocol' => 'smtp',
            'smtp_host' => 'mail.positivequadrant.in', // Try specific SMTP host
            'smtp_port' => 587, // Use 465 for SSL if needed
            'smtp_user' => 'ei73pg4h9q5h',
            'smtp_pass' => 'Rajnish@123',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE,
            'newline' => "\r\n",
        ]);

        // Admin Email
        $adminMessage = $this->load->view('internship_admin_email', $formData, TRUE);

        $this->email->from('ei73pg4h9q5h@positivequadrant.in', 'Positive Quadrant Technologies LLP');
        $this->email->to('rajnish.nationfirst@gmail.com');
        $this->email->cc(['uttamvishwakarma99@gmail.com', 'naimishdwivedi1307@gmail.com']);
        $this->email->set_mailtype("html"); // Explicitly set mailtype to HTML
        $this->email->subject("New Enquiry Received");
        $this->email->message($adminMessage);

        if (!$this->email->send()) {
            log_message('error', "Admin Email Failed: " . $this->email->print_debugger(['headers', 'subject', 'body']));
        }

        // User Thank You Email
        $this->email->clear(); // Clear email data
        $thankYouMessage = $this->load->view('internship_thankyou_email', $formData, TRUE);

        $this->email->from('ei73pg4h9q5h@positivequadrant.in', 'Positive Quadrant Technologies LLP');
        $this->email->to($formData['email']);
        $this->email->set_mailtype("html"); // Explicitly set mailtype to HTML
        $this->email->subject("Thank You for Your Enquiry");
        $this->email->message($thankYouMessage);

        if (!$this->email->send()) {
            log_message('error', "User Email Failed: " . $this->email->print_debugger(['headers', 'subject', 'body']));
        }
    }






// dynamic views of crm

 public function caseStudy()
    {
       
       
       

        // ✅ SEO Meta Information for Services Page
        $data['title'] = 'Our Services | Positive Quadrant Technologies LLP';
        $data['description'] = 'Explore a wide range of IT services by Positive Quadrant Technologies LLP, including web development, mobile app development, digital transformation, and enterprise software solutions.';
        $data['keywords'] = 'IT services, software development services, mobile app development, web development, digital services in Mumbai, Positive Quadrant Technologies';
        $data['author'] = 'Positive Quadrant Technologies LLP';
        $data['hire_categories'] = $this->home_model->get_categories_with_tech_names();

        // Load views
        $this->load->view('header', $data);
        $this->load->view('get-free-trial', $data);
        $this->load->view('footer');
    }


}
