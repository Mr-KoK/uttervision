<?php
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider {
    public function boot(){
        $this->loadRoutesFrom();
    }
}