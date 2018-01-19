<?php
/**
 * Copyright (c) Ce code est la propriété de Jangolo Sarl, Cette application est EXCLUSIVEMENT réservée à un usage interne de l'entreprise qui n'a par conséquent donné AUCUNE autorisation à qui que ce soit. Vous vous exposez de ce fait à des poursuites judiciaires si vous disposez de ce code.
 */

defined('SYSPATH') or die('No direct script access.');

/**
 * This Code is Copyright of Jangolo.
 * Owner: Bertrand Foffe (angefofe@gmail.com)
 * From Date: 1-1-2012
 * Warning : Ce code est la propriété de Jangolo Sarl, Toute personne disposant d'une copie de ce code sans autorisation écrire et signée de l'entreprise s'expose à des poursuites judiciaires.
 */


class Formhelpers
{

    public static function error_tag($field_name)
    {

        if (isset($_POST) && isset($_POST['errors']) && isset($_POST['errors'][$field_name])) echo " has-error";
    }

    public static function display_errors($post)
    {
        $returnString = "";
        if (isset($post['errors'])) {
            $returnString = $returnString . "<div class='alert alert-danger' role='alert'>";
            foreach ($post['errors'] as $error)
                $returnString = $returnString . $error . "<br/>";
            $returnString = $returnString . "</div>";
        }
        echo $returnString;
    }

    public static function return_entered_value($post, $field_name)
    {
        if (isset($post)) {
            echo Arr::get($post, $field_name);
        }


    }

    public static function return_object_value($post, $field_name)
    {
        if (isset($post)) {

            return $post->$field_name;

        }

    }

    public static function countries()
    {
        $countries = ORM::factory('Country')->order_by('en', 'asc')->find_all();
        return self::create_option_list($countries, "id", "en", "country_id");
    }

    private static function create_option_list($list, $value, $label, $select)
    {
        $listCat = "";

        foreach ($list as $item) {
            if (isset($_POST[$select]) && $_POST[$select] == $item->$value)
                $listCat = $listCat . "<option value='" . $item->$value . "' selected >" . $item->$label . "</option>";
            else
                $listCat = $listCat . "<option value='" . $item->$value . "'>" . $item->$label . "</option>";
        }

        return $listCat;

    }

    public static function cities()
    {
        $countries = ORM::factory('City')->order_by('city', 'asc')->find_all();

        return self::create_option_list($countries, "id", "city", "city_id");
    }

    public static function articles()
    {
        $articles = ORM::factory('Article')->order_by('id', 'desc')->find_all();
        return self::create_option_list($articles, "id", "title", "article_id");
    }

    public static function partner_articles()
    {
        $articles = ORM::factory('Article')->order_by('id', 'desc')->where('is_for_sale','!=',0)->find_all();
        return self::create_option_list($articles, "id", "title", "article_id");
    }

    public static function categories()
    {
        $categories = ORM::factory('Category')->order_by('name', 'asc')->find_all();
        return self::create_option_list($categories, "id", "name", "category_id");
    }

    public static function create_dropdown($list,$value,$label,$selected)
    {
        return self::create_option_list_no_post($list, $value, $label, $selected);
    }

    private static function create_option_list_no_post($list, $value, $label, $select)
    {
        $listCat = "";

        foreach ($list as $item) {
            if ($select == $item->$value)
                $listCat = $listCat . "<option value='" . $item->$value . "' selected >" . $item->$label . "</option>";
            else
                $listCat = $listCat . "<option value='" . $item->$value . "'>" . $item->$label . "</option>";
        }

        return $listCat;

    }
    public static function create_menu_options($list, $value, $label, $select)
    {
        $listCat = "";

        foreach ($list as $item) {
            if ($select == $item->$value)
                $listCat = $listCat . "<option value='" . $item->$value . "' selected >" . $item->$label . "</option>";
            else
                $listCat = $listCat . "<option value='" . $item->$value . "'>" . $item->module->title." - ".$item->$label . "</option>";
        }
        return $listCat;

    }

    public static function newsletters()
    {
        $newsletters = ORM::factory('Newsletter')->order_by('id', 'desc')->find_all();
        return self::create_option_list($newsletters, "id", "title", "newsletter_id");
    }
    //////////////////////////////////////////////////////////////////////////
    // Users
    //////////////////////////////////////////////////////////////////////////

    public static function superstructures()
    {
        $categories = ORM::factory('Label')->get_structures();
        return self::create_option_list($categories, "id", "label", "structure_id");
    }

    public static function fueltypes()
    {
        $categories = ORM::factory('Label')->get_fueltypes();
        return self::create_option_list($categories, "id", "label", "fuel_type_id");
    }

    public static function dealers()
    {
        $dealers = ORM::factory('User')->where('email', 'not like', '%jangolo.cm')->order_by('email', 'asc')->find_all();
        return self::create_option_list($dealers, "id", "email", "user_id");
    }

    public static function owners()
    {
        $dealers = ORM::factory('User')->where('is_emp', '=', 1)->or_where('is_farm', '=', 1)
            ->order_by('email', 'asc')->find_all();
        return self::create_option_list($dealers, "id", "username", "owner_id");
    }

    public static function owners2($selector)
    {
        $dealers = ORM::factory('User')->where('is_emp', '=', 1)->or_where('is_farm', '=', 1)
                      ->order_by('email', 'asc')->find_all();
        return self::create_option_list_no_post($dealers, "id", "username", $selector);
    }

    public static function standard_users()
    {
        $dealers = ORM::factory('User')->where('is_emp', '=', 0)->order_by('email', 'asc')->find_all();
        return self::create_option_list($dealers, "id", "username", "dealer");
    }

    public static function suppliers()
    {
        $companies = ORM::factory('Company')->where('is_supplier', '=', 1)->order_by('name', 'asc')->find_all();
        return self::create_option_list($companies, "id", "name", "supplier_id");
    }

    public static function approvers()
    {
        $dealers = ORM::factory('User')->order_by('email', 'asc')->find_all();
        return self::create_option_list($dealers, "id", "username", "approved_by");
    }

    public static function user_filter($filter)
    {
        $dealers = ORM::factory('User')->where('is_emp', '=', 1)->or_where('is_farm', '=', 1)
            ->order_by('email', 'asc')->find_all();
        return self::create_option_list($dealers, "id", "username", $filter);
    }

    public static function user_all($filter)
    {
        $dealers = ORM::factory('User')
//            ->where('firstname','!=','')
//            ->or_where('lastname','!=','')
            ->order_by('email', 'asc')->find_all();
        return self::create_option_list($dealers, "id", "email", $filter);
    }

    //////////////////////////////////////////////////////////////////////////
    // Trucks
    //////////////////////////////////////////////////////////////////////////

    public static function user_with_phone($filter)
    {
        $dealers = ORM::factory('User')->where('mobile','!=','')
            ->order_by('firstname', 'asc')->find_all();
        return self::create_option_list($dealers, "mobile", "firstname", $filter);
    }

    public static function leeds_with_phone($filter)
    {
        $dealers = ORM::factory('Leed')->where('status', '=', 'Actif')->and_where('mobile','!=','')
            ->order_by('firstname', 'asc')->find_all();
        return self::create_option_list($dealers, "mobile", "firstname", $filter);
    }

    public static function brands()
    {
        $categories = ORM::factory('Label')->get_brands();
        return self::create_option_list($categories, "id", "label", "brand_id");

    }



    //////////////////////////////////////////////////////////////////////////
    // Finance
    //////////////////////////////////////////////////////////////////////////

    public static function gearboxes()
    {
        $categories = ORM::factory('Label')->get_gearboxes();
        return self::create_option_list($categories, "id", "label", "gear_box_id");
    }

    public static function configurations()
    {
        $categories = ORM::factory('Label')->get_configurations();
        return self::create_option_list($categories, "id", "label", "configuration_id");
    }

    public static function expensestypes()
    {
        $dealers = ORM::factory('Expensetype')->order_by('title', 'asc')->find_all();
        return self::create_option_list($dealers, "id", "title", "expensetype_id");
    }

    public static function expensestypes_elevage()
    {
        $dealers = ORM::factory('Expensetype')->where('is_elevage','=',1)->order_by('title', 'asc')->find_all();
        return self::create_option_list($dealers, "id", "title", "expensetype_id");
    }


    public static function expensestypes_culture()
    {
        $dealers = ORM::factory('Expensetype')->where('is_culture','=',1)->order_by('title', 'asc')->find_all();
        return self::create_option_list($dealers, "id", "title", "expensetype_id");
    }

    public static function products()
    {
        $dealers = ORM::factory('Product')->order_by('title', 'asc')->find_all();
        return self::create_option_list($dealers, "id", "title", "product_id");
    }

    public static function cultures()
    {
        $dealers = ORM::factory('Product')->where('type','=','AGRICULTURE')->order_by('title', 'asc')->find_all();
        return self::create_option_list($dealers, "id", "title", "product_id");
    }

    public static function elevages()
    {
        $dealers = ORM::factory('Product')->where('type','=','ELEVAGE')->order_by('title', 'asc')->find_all();
        return self::create_option_list($dealers, "id", "title", "product_id");
    }



    //////////////////////////////////////////////////////////////////////////
    // Utils
    //////////////////////////////////////////////////////////////////////////

    public static function expenses()
    {
        $dealers = ORM::factory('Expense')->order_by('title', 'asc')->find_all();
        return self::create_option_list($dealers, "id", "title", "expense_id");
    }

    public static function projects()
    {
        $dealers = ORM::factory('Project')->order_by('title', 'asc')->find_all();
        return self::create_option_list($dealers, "id", "title", "project_id");
    }

    public static function years($select)
    {
        $listCat = "";
        foreach (Date::years(1980, 2015) as $year) {

            if (isset($_POST[$select]) && $_POST[$select] == $year)
                $listCat = $listCat . "<option value='" . $year . "' selected >" . $year . "</option>";
            else
                $listCat = $listCat . "<option value='" . $year . "'>" . $year . "</option>";

        }
        return $listCat;

    }

    public static function process_valid_check($post, $files)
    {
        $user_model = new Model_User();
        $email = $post['email'];

        //Checks if the user exist and loads it
        if ($user_model->user_exists($email)) {
            $user = $user_model->get_user_by_email($email);
            $post['user_id'] = $user->id;
        } else {
            //Create account for user because user does not exist
            $newPost = $user_model->process_automatic_registration($post);
            $user = $newPost['user'];
            if ($user != NULL) {
                $post['user_id'] = $user->id;
                Shophelper::create_shop_name($user);
                $activate_url = HTML::anchor(URL::base(true, true) . 'admin/activation?tok=' .
                    $newPost['password'], 'Activate');
                self::notify_account_creation($user,$activate_url);
                $newPost['password'] = null;

            }
        }
        if (isset($post['user_id'])) {
            $post['price'] = preg_replace('/[^0-9,]|,[0-9]*$/', '', $post['price']);
            if (isset($post['id'])) {
                $article = ORM::factory('Article', $post['id'])->values($post)->save();
            } else {
                $article = ORM::factory('Article')->values($post)->save();
            }

            $article->description = Text::auto_p($post['description']);
            $article->save();

            Uploadhelpers::upload_pictures($article, $files);

            if (count($article->articleimages->find_all()) == 0) {
                Messaging::missing_photo_notification($article->user, $article);
            }
            HTTP::redirect('admin/index');
        }

    }

    public static function notify_account_creation($user, $activate_url)
    {
        Controller_Mails::action_senditNoConfirmation("Confirm your account", array
        ("info@jangolo.com" => 'Jangolo Market'), $user->email, Controller_Mails::setfooter
        ("Dear " . $user->username . ", <br/> Congratulations, you just created your Jangolo
				account. To confirm your account we invite you to click on the following link to
				activate your account and get ready to enjoy the services of Jangolo :"
            . $activate_url . " <br/>", "Sales Department", "info@jangolo.com", "Skype :
					jangolo.market"), array("info@jangolo.com" => 'Jangolo Market'));

        Controller_Mails::action_senditNoConfirmation("New Account created",
            "info@jangolo.com", "angefofe@gmail.com", Controller_Mails::setfooter("A new
account was created on the server. <br/> <b>Username :</b>" . $user->username, " Sales Department",
                "info@jangolo.com", "Skype : jangolo.market"), array("info@jangolo.com" => 'Jangolo Market'));

    }

    public static function validate_article($post)
    {
        return Validation::factory($post)
            ->rule('title', 'not_empty')
            ->rule('description', 'not_empty')
            ->rule('category_id', 'not_empty')
            ->rule('city_id', 'not_empty')
            //->rule('picture1', 'not_empty')
            ->rule('price', 'not_empty')
            //->rule('phone', 'not_empty')
            ->rule('email', 'not_empty')
            //->rule('country_id', 'not_empty')
            //->rule('terms', 'equals',1)
            ->rule('phone', 'not_empty');
    }

    public static function object_list_contains_value($list,$property,$value){
        foreach($list as $item){
            if($item->$property == $value)
                return true;

        }
        return false;
    }

    public static function get_edit_value($post, $key, $removeHtmlTags = false)
    {
        if ($post != null) {
            if ($removeHtmlTags)
                return strip_tags($post->$key, "<b>");
            else
            return $post->$key;
        }
        else
            return'';
    }

    public static function dropdown_is_selected($post_value, $option)
    {
        if ($post_value == $option)
            return "selected";
    }

    public static function new_button($link,$text){
        return HTML::anchor($link,"<span class='fa fa-plus'></span> ".Helps::translate($text),array('class'=>'btn btn-success'))."<br><br>";
    }

    public static function button($link, $text)
    {
        return HTML::anchor($link, Helps::translate($text), array('class' => 'btn btn-success', 'style' => 'margin-right:5px'));
    }

    public static function months_dropdown($month){

        $view = View::factory('formdropdown/months_dropdown');
        $view->month = $month;
        return $view;
    }

    public static function product_active_categories(){
        $products = ORM::factory('Product')->where('status','=','PUBLISHED')->find_all()->as_array('category_id');
        $lik = array();
        foreach ($products as $product)
            $lik[]=$product->category_id;
        return ORM::factory('Productcategory')
            ->where('id','IN',$lik)->order_by('title')
            ->and_where('title','!=','Package')
            ->find_all()->cached(100000);
    }


}


