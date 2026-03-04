<?php
class Employer_DashboardController extends Controller {
    public function index(): void {
        requireRole('employer');
        $this->view('employer/dashboard', ['pageTitle' => 'Employer Dashboard', 'activePage' => '']);
    }
}
