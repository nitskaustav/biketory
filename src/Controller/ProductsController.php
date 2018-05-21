<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */  

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Mailer\Email;
use Cake\Routing\Router;

//use Cake\I18n\FrozenDate; 
use Cake\Database\Type; 
//use Cake\I18n\Time;
//use Cake\I18n\Date;
//Type::build('date')->setLocaleFormat('yyyy-MM-dd');

// Admin Users Management
class ProductsController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['result', 'details','searchcategory','categorydetails','categorylisting','addtocart','removefromcart','updatecart','cart','bikelisting','proceedtocheckout']);
     }   
    
    public $uses = array('User','Product');
    
   
     public function addproduct() {
        $this->viewBuilder()->layout('default');
        $this->loadModel('Users');
        $user = $this->Users->get($this->Auth->user('id'));
        $id=$this->Auth->user('id');
        $uid = $this->request->session()->read('Auth.User.id');
        $utype = $this->request->session()->read('Auth.User.utype');
        $uverify = $user->check_verified;
        
        if($uid!='' && isset($uid) && $utype==2){
        $this->loadModel('Products');
        
        $product = $this->Products->newEntity();
        
        if ($this->request->is('post')) {

            $flag = true;
           
            $tableRegObj = TableRegistry::get('Products');
           
            // Validating Form

            if($this->request->data['reg_number'] == ""){
                $this->Flash->error(__('Reg number can not be null. Please, try again.')); $flag = false;
            }
                      
            if($flag){
                  $this->request->data['seller_id']=$id;                 
                
                $product = $this->Products->patchEntity($product, $this->request->data);
                if ($rs=$this->Products->save($product)) {                 
                    $this->redirect(['action' => 'addproduct2/'.$rs->id]);
                }
            }
        }       
        }else{
             $this->Flash->error('You have no permission to access this.');
            return $this->redirect(['controller'=>'Users','action'=>'signin']);
        }
    }

    public function editproduct($eid=null) {
        $this->viewBuilder()->layout('default');
        $this->loadModel('Users');
        $user = $this->Users->get($this->Auth->user('id'));
        $id=$this->Auth->user('id');
        $uid = $this->request->session()->read('Auth.User.id');
        $utype = $this->request->session()->read('Auth.User.utype');
        $uverify = $user->check_verified;
        
        if($uid!='' && isset($uid) && $utype==2){
        $this->loadModel('Products');
        
        
        $product = $this->Products->get($eid);
        if ($this->request->is('post')) {
            $flag = true;
           
            $tableRegObj = TableRegistry::get('Products');
           
            // Validating Form

            if($this->request->data['reg_number'] == ""){
                $this->Flash->error(__('Reg number can not be null. Please, try again.')); $flag = false;
            }
                      
            if($flag){
                
                if ($this->request->is('post')) {
                    $flag = true;           
                    $tableRegObj = TableRegistry::get('Products');                   
                    if($flag){           
                        $product = $this->Products->patchEntity($product, $this->request->data);
                        if ($this->Products->save($product)) {
                            $this->redirect(['action' => 'addproduct2/'.$eid]);
                        }
                    }
                }


            }
        }
        else{
            $this->set(compact('product'));
            $this->set('_serialize', ['product']);
        }       
        }else{
             $this->Flash->error('You have no permission to access this.');
            return $this->redirect(['controller'=>'Users','action'=>'signin']);
        }
    }
    
    
    
    public function addproduct2($eid=null) {
        $this->viewBuilder()->layout('default');
        $this->loadModel('Users');
        $this->loadModel('Categories');
        $this->loadModel('Models');
        $this->loadModel('Makes');
        $this->loadModel('Colours');
        $this->loadModel('EngineSizes');
      
        $user = $this->Users->get($this->Auth->user('id'));
        $id=$this->Auth->user('id');
        $uid = $this->request->session()->read('Auth.User.id');
        $utype = $this->request->session()->read('Auth.User.utype');
        $uverify = $user->check_verified;
        //echo $uverify;exit;
        if($uid!='' && isset($uid) && $utype==2){
        $this->loadModel('Products');
        
        $product = $this->Products->get($eid);
        if ($this->request->is('post')) {

            $flag = true;
           
            $tableRegObj = TableRegistry::get('Products');                   
            if($flag){           
                $product = $this->Products->patchEntity($product, $this->request->data);
                if ($this->Products->save($product)) {
                    $this->redirect(['action' => 'addproduct3/'.$eid]);
                }
            }
        }
       
        $categorys=$this->Categories->find()->where(['Categories.status'=>1])->toArray();
        $models=$this->Models->find()->where(['Models.status'=>1])->toArray();
        $makes=$this->Makes->find()->where(['Makes.status'=>1])->toArray();
        $colours=$this->Colours->find()->where(['Colours.status'=>1])->toArray();
        $engins=$this->EngineSizes->find()->where(['EngineSizes.status'=>1])->toArray();
        //pr($stname);exit;
        $this->set(compact('categorys','models', 'product', 'makes', 'colours', 'engins'));
        $this->set('_serialize', ['categorys']);
        }else{
             $this->Flash->error('You have no permission to access this.');
            return $this->redirect(['controller'=>'Users','action'=>'signin']);
        }
    }
    
    
    
     public function addproduct3($eid=null) {
        $this->viewBuilder()->layout('default');
        $this->loadModel('Users');
        $this->loadModel('Categories');
        $this->loadModel('Productsimages');
      
        $user = $this->Users->get($this->Auth->user('id'));
        $id=$this->Auth->user('id');
        $uid = $this->request->session()->read('Auth.User.id');
        $utype = $this->request->session()->read('Auth.User.utype');
        $uverify = $user->check_verified;
        //echo $uverify;exit;
        if($uid!='' && isset($uid) && $utype==2){
        $this->loadModel('Products');
        $images = $this->Productsimages->find()->where(['product_id' => $eid])->toArray();        
        $product = $this->Products->get($eid);
        if ($this->request->is('post')) {
            $flag = true;           
            $tableRegObj = TableRegistry::get('Products');                   
            if($flag){           
                $product = $this->Products->patchEntity($product, $this->request->data);
                if ($this->Products->save($product)) {
                    $this->redirect(['action' => 'addproduct4/'.$eid]);
                }
            }
        }
       
        
        $this->set(compact('product', 'images'));
        $this->set('_serialize', ['product']);
        }else{
             $this->Flash->error('You have no permission to access this.');
            return $this->redirect(['controller'=>'Users','action'=>'signin']);
        }
    }


    public function addproduct4($eid=null) {
        $this->viewBuilder()->layout('default');
        $this->loadModel('Users');
        $this->loadModel('Categories');
        $this->loadModel('Models');
      
        $user = $this->Users->get($this->Auth->user('id'));
        $id=$this->Auth->user('id');
        $uid = $this->request->session()->read('Auth.User.id');
        $utype = $this->request->session()->read('Auth.User.utype');
        $uverify = $user->check_verified;
        //echo $uverify;exit;
        if($uid!='' && isset($uid) && $utype==2){
        $this->loadModel('Products');
        
        $product = $this->Products->get($eid);
        if ($this->request->is('post')) {

            $flag = true;
           
            $tableRegObj = TableRegistry::get('Products');                   
            if($flag){           
                $product = $this->Products->patchEntity($product, $this->request->data);
                if ($this->Products->save($product)) {
                    $this->redirect(['action' => 'success']);
                }
            }
        }
       
        $categorys=$this->Categories->find()->where(['Categories.status'=>1])->toArray();
        $models=$this->Models->find()->where(['Models.status'=>1])->toArray();
        //pr($stname);exit;
        $this->set(compact('categorys','models', 'product'));
        $this->set('_serialize', ['categorys']);
        }else{
             $this->Flash->error('You have no permission to access this.');
            return $this->redirect(['controller'=>'Users','action'=>'signin']);
        }
    }

     public function success() {
        $this->viewBuilder()->layout('default');
       
    }
    
    
    public function uploadPhoto($id = null){
           $this->viewBuilder()->layout('false');
           $this->loadModel('Productsimages');
            if(!empty($_FILES['files']['name'])){
                $no_files = count($_FILES["files"]['name']);
                for ($i = 0; $i < $no_files; $i++) {
                  if ($_FILES["files"]["error"][$i] > 0) {
                      echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
                  } else {
                     $pathpart=pathinfo($_FILES["files"]["name"][$i]);                    
                      $ext=$pathpart['extension'];          
                      $uploadFolder = "product_img/";
                      $uploadPath = WWW_ROOT . $uploadFolder;
                      $filename =uniqid().'.'.$ext;
                      $full_flg_path = $uploadPath . '/' . $filename;
                      if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $full_flg_path)) {
                        $data['product_id'] = $id;
                        $data['name'] = $filename;                           
                        $con = $this->Productsimages->newEntity();
                        $images = $this->Productsimages->patchEntity($con, $data);
                        if ($rs = $this->Productsimages->save($images)) {
                           $file = array('filename' => $filename, 'last_id' => $rs->id);
                                                                  
                        }                     
                        
                      } 
                      $file_details[] = $file;

                  }
                  
                  
              }
                $data = array('Ack'=>1, 'data'=>$file_details);
                    
               }
               else {

                 $data = array('Ack'=> 0);
               }
               echo json_encode($data);
              exit();
       }

        public function orderImage(){
           $this->viewBuilder()->layout('false');
           $this->loadModel('Productsimages');
           $i=1;         
            foreach ($_REQUEST['ids'] as $id) {
               $data['is_order'] = $i;
               $service = $this->Productsimages->get($id);
               $service = $this->Productsimages->patchEntity($service, $data);
               $this->Productsimages->save($service);
               $i++;
            }
             echo json_encode(array('Ack' => 1));
          die;
        }

        
       public function deleteImage(){          
             $this->viewBuilder()->layout('false');
             $this->loadModel('Productsimages');
             $image = $this->Productsimages->get($_REQUEST['id']);
            if ($this->Productsimages->delete($image)){ 
             $data = array('Ack'=> 1);
            }
              else{
                 $data = array('Ack'=> 0);
              }
              echo json_encode($data);
              exit();
       }
    
    
    public function listproduct() {
        $this->viewBuilder()->layout('default');
        $this->loadModel('Products');
        $this->loadModel('Users');
        $this->loadModel('Productsimages');
        $this->loadModel('Bikemodels');
        $this->loadModel('Makes');
        $this->loadModel('Categories');
        $user = $this->Users->get($this->Auth->user('id'));
        $uid = $this->request->session()->read('Auth.User.id');
        $utype = $this->request->session()->read('Auth.User.utype');
        $uverify = $user->check_verified;
        $conditions = ['Products.seller_id'=>$uid];
           
        $this->paginate = [
            'conditions' => $conditions,
            'contain' => ['Productsimages', 'Bikemodels', 'Makes', 'Categories'],
            'order' => [ 'id' => 'DESC']
        ];
        $products = $this->paginate($this->Products); 
       /* pr($products);
        die;  */    
        $this->set(compact('products','user'));
        $this->set('_serialize', ['products']);
 
    }
    
    
   public function productdelete($eid = null) {
        $this->loadModel('Products');
        $product = $this->Products->get($eid);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('Product has been deleted.'));
        } else {
            $this->Flash->error(__('Product could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'listproduct']);
    } 

    public function result(){

        $this->loadModel('Products');
        $this->loadModel('Productsimages');
        $this->loadModel('Bikemodels'); 
        $this->loadModel('Makes'); 
      
       $keyword = $this->request->data['keyword'];
       $postal_code = $this->request->data['postal_code'];
       $mileage = $this->request->data['mileage'];
       $make_id = $this->request->data['make_id'];
       $model_id = $this->request->data['model_id'];
       $min_cc = $this->request->data['min_cc'];
       $max_cc = $this->request->data['max_cc'];

       $min_price = $this->request->data['min_price'];
       $max_price = $this->request->data['max_price'];
       $mileage_from = $this->request->data['mileage_from'];
       $mileage_to = $this->request->data['mileage_to'];

       $makes = $this->Makes->find()->where(['status' => 1])->toArray();
       $models = $this->Bikemodels->find()->where(['status' => 1])->toArray();

        $uid = $this->request->session()->read('Auth.User.id');
       $condition = array('is_active' => 'Y');

       if(isset($keyword) and $keyword != ""){
        $condition[] = array('Products.reg_number LIKE'=>'%'.$keyword.'%');
       }

        if(isset($postal_code) and $postal_code != ""){
            $condition[] = array('Products.postal_code'=> $postal_code);
        }

        if(isset($mileage) and $mileage != ""){
            $condition[] = array('Products.mileage'=> $mileage);
        }

        if(isset($make_id) and $make_id != ""){
            $condition[] = array('Makes.id'=> $make_id);
        }

        if(isset($model_id) and $model_id != ""){
            $condition[] = array('Bikemodels.id'=> $model_id);
        }

       if((isset($min_cc) and $min_cc != "") and (isset($max_cc) and $max_cc != "")){
          $condition[] = array('Products.cc >='.$min_cc.' and Products.cc <='.$max_cc);
         }

       if((isset($min_price) and $min_price != "") and (isset($max_price) and $max_price != "")){
        $condition[] = array('Products.price >='.$min_price.' and Products.price <='.$max_price);
       } 


       $products = $this->Products->find()                        
                        ->where($condition)                        
                        ->order('Products.price')
                        ->contain(['Productsimages', 'Makes', 'Bikemodels']);
                        
            
         $this->set(compact('products', 'makes', 'models'));
    }

    public function details($id=null){
        
        $this->viewBuilder()->layout('default');
        $this->loadModel('Products');
        $this->loadModel('Users');
        $this->loadModel('Productsimages');
        $this->loadModel('Bikemodels');
        $this->loadModel('Makes');
        $this->loadModel('Categories');
        $this->loadModel('EmailTemplates');

        $product = $this->Products->find()->contain(['Productsimages','Users','Bikemodels', 'Makes', 'Categories'])->where(['Products.id' => $id])->first();
      // echo "<pre>";
      //  print_r($product);
      //  die;
          if ($this->request->is('post')) {
            if ($this->request->data['name'] == "") {
                $this->Flash->error(__('Name can not be null. Please, try again.'));
                $flag = false;
            }

            
            $etRegObj = TableRegistry::get('EmailTemplates');
            $emailTemp = $etRegObj->find()->where(['id' => 4])->first()->toArray();            
            $name = $this->request->data['name'];
            $emailfrom = $this->request->data['email'];
            $phone = $this->request->data['phone'];            
            $message = $this->request->data['message'];
            //$mail_To = $product['contact_email'];
            $mail_To = 'kaustav@natitsolved.com';
            $mailusername = 'Biketory';
            //$mail_CC = '';
            $mail_subject = $emailTemp['subject'];
            $url = Router::url('/', true);


            $mail_body = str_replace(array('[NAME]', '[EMAIL]', '[PHONE]', '[MESSAGE]'), array($name, $emailfrom, $phone, $message), $emailTemp['content']);
            //echo $mail_body; exit;


            $email = new Email('default');
            $email->emailFormat('html')->from([$emailfrom => $mailusername])
                    ->to($mail_To)
                    ->subject($mail_subject)
                    ->send($mail_body);
            $this->Flash->success(__('Message delivered successfully.'));
        }
        $this->set(compact('product'));
        $this->set('_serialize', ['product']);
    }

    public function searchcategory($cat_id){
      
      $this->viewBuilder()->layout('default');
      //$this->loadModel('Users');
      $this->loadModel('Categories');
      $this->loadModel('Gears');
      $this->loadModel('Brands');


      /*echo "<pre>";
      print_r($gears);die;*/
      // $user = $this->Users->get($this->Auth->user('id'));
      // $uid = $this->request->session()->read('Auth.User.id');
      // $utype = $this->request->session()->read('Auth.User.utype');
      // $uverify = $user->check_verified;
      $conditions = ['Gears.category_id'=>$cat_id];
         
      /*$this->paginate = [
          'conditions' => $conditions,
          'contain' => ['Productsimages', 'Bikemodels', 'Makes', 'Categories'],
          'order' => [ 'id' => 'DESC']
      ];
      $products = $this->paginate($this->Products);*/
      /* pr($products);
      die;  */
      $this->paginate = [
          'conditions' => $conditions,
          'contain' => ['Categories','Brands'],
          'order' => [ 'id' => 'DESC']
      ];

      $gears = $this->paginate($this->Gears);

      
      $this->set(compact('gears','user'));
      $this->set('_serialize', ['gears']);
    }

    public function categorydetails($product_id){

      $this->viewBuilder()->layout('default');
      //$this->loadModel('Users');
      $this->loadModel('Categories');
      $this->loadModel('Gears');
      $this->loadModel('Brands');

      // $user = $this->Users->get($this->Auth->user('id'));
      // $uid = $this->request->session()->read('Auth.User.id');
      // $utype = $this->request->session()->read('Auth.User.utype');
      // $uverify = $user->check_verified;
      $conditions = ['Gears.id'=>$product_id];

      $this->paginate = [
          'conditions' => $conditions,
          'contain' => ['Categories','Brands'],
          'order' => [ 'id' => 'DESC']
      ];

      $gears = $this->paginate($this->Gears);

      // echo "<pre>";
      // print_r($gears);
      // die;

      $this->set(compact('gears','user'));
      $this->set('_serialize', ['gears']);

    }

    public function categorylisting(){
        $this->loadModel('Users');
        $this->loadModel('Makes');
        $this->loadModel('Bikemodels');
        $this->loadModel('Categories');

        $makes = $this->Makes->find()->where(['status' => 1])->toArray();
        $models = $this->Bikemodels->find()->where(['status' => 1])->toArray();
        $categories = $this->Categories->find()->toArray();

        $this->set(compact('makes', 'models', 'categories'));
    }

    public function addtocart($product_id){
      //echo $product_id;

      $this->viewBuilder()->layout('default');
      $this->loadModel('Users');
      $this->loadModel('Categories');
      $this->loadModel('Gears');
      $this->loadModel('Brands');
      $this->loadModel('Tempcarts');


      if($this->Auth->user('id')){
        //$temp_cart = $this->Tempcarts->newEntity();
        
        $user = $this->Users->get($this->Auth->user('id'));
        $uid = $this->request->session()->read('Auth.User.id');
        $utype = $this->request->session()->read('Auth.User.utype');
        $uverify = $user->check_verified;



        $conditions = ['Gears.id'=>$product_id];
        $this->paginate = [
            'conditions' => $conditions,
            'contain' => ['Categories','Brands'],
            'order' => [ 'id' => 'DESC']
        ];
        $gears = $this->paginate($this->Gears);



        foreach ($gears as $gear_val) {
          $category_name = $gear_val->category->name;
          $brand_name = $gear_val->brand->brand_name;
          $size = $gear_val->size_id;
          $price = $gear_val->price;
          $description = $gear_val->description;
          $item_location = $gear_val->item_location;
          $product_name = $gear_val->product_name;
          $upload = $gear_val->upload;
        }
        $upload_array = explode(",", $upload);


        

        $product_exist = $this->Tempcarts->find()->where(['user_id' => $user->id,'prd_id' => $product_id])->toArray();
        // echo "<pre>";
        // print_r($product_exist);die;



        if(!empty($product_exist)){

          foreach ($product_exist as $prod_val) {
            $id = $prod_val->id;
            $product_prev_quantity = $prod_val->quantity;
            $productbase_price = $prod_val->price;
          }
          $new_prd_qty = $product_prev_quantity+1;
          $new_product_price = $productbase_price*$new_prd_qty;

          $temp_cart_data['user_id'] = $user->id;
          $temp_cart_data['prd_id'] = $product_id;
          $temp_cart_data['name'] = $product_name;
          $temp_cart_data['image'] = $upload_array[0];
          $temp_cart_data['price'] = $new_product_price;
          $temp_cart_data['quantity'] = $new_prd_qty;
          // echo "<pre>";
          // print_r($temp_cart_data);die;
          $product_exist = $this->Tempcarts->get($id);
        }
        else{
          $product_exist = $this->Tempcarts->newEntity();
          $temp_cart_data['user_id'] = $user->id;
          $temp_cart_data['prd_id'] = $product_id;
          $temp_cart_data['name'] = $product_name;
          $temp_cart_data['image'] = $upload_array[0];
          $temp_cart_data['price'] = $price;
          $temp_cart_data['quantity'] = 1;
        }

        $temp_data = $this->Tempcarts->patchEntity($product_exist, $temp_cart_data);



        if ($rs=$this->Tempcarts->save($temp_data)) {
          $this->Flash->success(__('Product added to cart.'));
        }


        return $this->redirect(['action' => 'cart']);
        /*$all_temp_cart_data = $this->Tempcarts->find()->where(['user_id' => $user->id])->toArray();

        //echo "<pre>";print_r($all_temp_cart_data);die;


        $this->set(compact('gears','user','all_temp_cart_data'));
        $this->set('_serialize', ['gears']);*/
      }
      else{
        $this->Flash->error(__('Please login to add to cart'));
        return $this->redirect(['action' => 'categorylisting']);
      }

    }

    public function cart(){
      $this->loadModel('Users');
      $this->loadModel('Tempcarts');

      $user = $this->Users->get($this->Auth->user('id'));
      $uid = $this->request->session()->read('Auth.User.id');
      $utype = $this->request->session()->read('Auth.User.utype');
      $uverify = $user->check_verified;

      $all_temp_cart_data = $this->Tempcarts->find()->where(['user_id' => $user->id])->toArray();

      $this->set(compact('user','all_temp_cart_data'));
    }

    public function updatecart(){
      
      $this->loadModel('Users');
      $this->loadModel('Tempcarts');
      $this->loadModel('Gears');

      $user = $this->Users->get($this->Auth->user('id'));
      $uid = $this->request->session()->read('Auth.User.id');
      $utype = $this->request->session()->read('Auth.User.utype');
      $uverify = $user->check_verified;

      if($this->request->is('post')){

        $qty = $this->request->data['qty'];
        $id = $this->request->data['id'];
        $user_id = $this->request->data['user_id'];
        $prd_id = $this->request->data['prd_id'];

        if($qty<1){
          $this->Flash->error(__('Quantity cannot be less than one. Please remove the product'));
          return $this->redirect(['action' => 'cart']);
        }

        $get_price = $this->Gears->find()->select('price')->where(['id' => $prd_id])->toArray();
        foreach ($get_price as $price) {
          $prd_price = $price->price;
        }

        $product_exist = $this->Tempcarts->get($id);

        foreach ($product_exist as $prod_details) {
          $qty = $prod_details->quantity;
        }

        $new_price = $qty*$prd_price;

        $update_array['quantity'] = $qty;
        $update_array['price'] = $new_price;

        $update_data = $this->Tempcarts->patchEntity($product_exist, $update_array);

        if ($rs=$this->Tempcarts->save($update_data)) {
          $this->Flash->success(__('Product quantity updated.'));
          return $this->redirect(['action' => 'cart']);
        }
      }

    }

    function removefromcart(){
      $this->loadModel('Users');
      $this->loadModel('Tempcarts');

      $user = $this->Users->get($this->Auth->user('id'));
      $uid = $this->request->session()->read('Auth.User.id');
      $utype = $this->request->session()->read('Auth.User.utype');
      $uverify = $user->check_verified;

      $id = $_REQUEST['id'];
      $temp_data = $this->Tempcarts->get($id);
      
      $this->Tempcarts->delete($temp_data);
      exit();
      
    }

    public function bikelisting(){
      $this->viewBuilder()->layout('default');
      $this->loadModel('Makes');

      $makes = $this->paginate($this->Makes);
      $this->set(compact('makes'));
    }

    public function proceedtocheckout(){
      $this->viewBuilder()->layout('default');
      $this->loadModel('Users');
      $this->loadModel('Tempcarts');

      $user = $this->Users->get($this->Auth->user('id'));
      $uid = $this->request->session()->read('Auth.User.id');
      $utype = $this->request->session()->read('Auth.User.utype');
      $uverify = $user->check_verified;

      $user_id = $this->request->data['user_id'];

      $all_temp_cart_data = $this->Tempcarts->find()->where(['user_id' => $user_id])->toArray();

      $this->set(compact('user','all_temp_cart_data'));
    }

    /*public function addtowishlist(){
      $data = array('Ack' => 1);
      echo json_encode($data);
    }*/
}

?>