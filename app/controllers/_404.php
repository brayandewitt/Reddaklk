<?php


class _404 extends Controller
{
    public function index()
    {
        $data['tittle'] = "404";
        $this->view('404', $data);
    }
}
