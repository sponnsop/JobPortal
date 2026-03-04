<?php
require_once BASE_PATH . '/app/Models/Job.php';
require_once BASE_PATH . '/app/Models/Blog.php';
require_once BASE_PATH . '/app/Models/Testimonial.php';

class PageController extends Controller {

    public function home(): void {
        $this->view('pages/home', [
            'pageTitle'    => 'Home',
            'activePage'   => 'home',
            'featuredJobs' => (new Job())->getFeatured(3),
            'latestPosts'  => (new Blog())->getLatest(3),
            'testimonials' => (new Testimonial())->getActive(),
        ]);
    }

    public function about(): void {
        $this->view('pages/about', ['pageTitle' => 'About Us', 'activePage' => 'about']);
    }

    public function team(): void {
        $this->view('pages/team', ['pageTitle' => 'Our Team', 'activePage' => 'team']);
    }

    public function terms(): void {
        $this->view('pages/terms', ['pageTitle' => 'Terms & Conditions', 'activePage' => 'terms']);
    }

    public function testimonials(): void {
        $this->view('pages/testimonials', [
            'pageTitle'    => 'Testimonials',
            'activePage'   => 'testimonials',
            'testimonials' => (new Testimonial())->getActive(),
        ]);
    }
}
