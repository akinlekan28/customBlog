<?php

/**
 * Created by PhpStorm.
 * User: Akinlekan
 * Date: 3/3/2017
 * Time: 6:59 PM
 */
class Page_Data
{
    public $title = "";
    public $content = "";
    public $css = "";
    public $scriptElement = "";
    public $jquery = "";
    public $bootstrapjs = "";
    public function addCss($href) {
        $this->css .="<link href='$href' rel='stylesheet' />";
    }
    public function addScript($src) {
        $this->scriptElement .="<script src='$src'></script>";
    }

    public function jquery($src) {
        $this->jquery .="<script src='$src'></script>";
    }

    public function bootstrapjs($src) {
        $this->bootstrapjs .="<script src='$src'></script>";
    }
}