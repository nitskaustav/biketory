<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class ProductsController extends AppController {

    public function index() {
        $this->loadModel('Products');
        $this->loadModel('Bikemodels');
        $this->loadModel('Users');

        $this->paginate = [
            'contain' => ['Bikemodels', 'Users', 'Categories'],
            'order' => [ 'id' => 'DESC'],
            'limit' => 10
        ];
        $result = $this->paginate($this->Products);
        //echo '<pre>';
        //print_r($result);
        //exit;
        //$models = $this->Products->find()->where(['status' => 1])->toArray();
        $this->set(compact('result'));
    }

    public function addproduct() {
        $this->viewBuilder()->layout('admin');
        $this->loadModel('Productsimages');
        $this->loadModel('Bikemodels');
        $this->loadModel('Users');
        $this->loadModel('Products');
        $this->loadModel('Categories');
        $categories = $this->paginate($this->Categories);
        //print_r($categories);
        //exit;
        $models = $this->paginate($this->Bikemodels);
        $seller = $this->paginate($this->Users->find()->where(['is_active' => 1, 'utype' => 2]));
        //print_r($seller);
        //exit;
        $this->set(compact('models', 'seller', 'categories'));
        $products = $this->Products->newEntity();
        $productsimg = $this->Productsimages->newEntity();
        $lastid = '';
        if ($this->request->is(['post', 'put'])) {

            $flag = true;
            if ($this->request->data['cc'] == "") {
                $flag = false;
            }

            if ($this->request->data['price'] == "") {
                $flag = false;
            }

            if ($this->request->data['mileage'] == "") {
                $flag = false;
            }

            if ($this->request->data['color'] == "") {
                $flag = false;
            }

            if ($this->request->data['fuel_type'] == "") {
                $flag = false;
            }

//            if ($this->request->data['seller_id'] == "") {
//                $flag = false;
//            }


            if ($flag) {
                // print_r($this->request->data);
                //exit;
                //$this->request->data['seller_id'] = $this->request->data['seller_id'];
                $products = $this->Products->patchEntity($products, $this->request->data);
                $save = $this->Products->save($products);
                if ($save) {
                    $lastid = $save->id;

                    $file_image_name = explode(",", $this->request->data['image']);

                    foreach ($file_image_name as $img) {


                        $this->request->data['product_id'] = $lastid;
                        $this->request->data['path'] = $img;
                        $productsimages = $this->Productsimages->newEntity();
                        $productsimages = $this->Productsimages->patchEntity($productsimages, $this->request->data);

                        $this->Productsimages->save($productsimages);
                    }
                    //$lastid = $this->Products->getInsertID();
                    //$productsimages = $this->Productsimages->newEntity();
                    //$products = $this->Products->patchEntity($products, $this->request->data); 
                    //$this->Flash->success(__('Products has been saved.'));
                } else {
                    $this->Flash->error(__('Products could not be saved. Please, try again.'));
                }
            } else {
                $this->Flash->error(__('Some fields are empty. Please, try again.'));
            }


            if ($flag) {
                $this->Flash->success(__('Products has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
        }
        $this->loadModel('Bikemodels');
        $result = $this->Bikemodels->find('all');
        $this->set(compact('result'));
    }

    public function editproduct($id = null) {
        $this->viewBuilder()->layout('admin');
        $this->loadModel('Users');
        $this->loadModel('Products');
        $this->loadModel('Productsimages');
        $this->loadModel('Bikemodels');
        $this->loadModel('Categories');
        $categories = $this->paginate($this->Categories);
        $models = $this->paginate($this->Bikemodels);
        $seller = $this->paginate($this->Users->find()->where(['is_active' => 1, 'utype' => 2]));
        $this->set(compact('models', 'seller', 'categories'));
        $products = $this->Products->get(urlencode(base64_decode($id)));

        //$products = $this->Products->newEntity();
        //$productsimg = $this->Productsimages->newEntity();
        if ($this->request->is(['post', 'put'])) {
            //print_r($this->request->data);
            //exit;
            $flag = true;
            if ($this->request->data['cc'] == "") {
                $flag = false;
            }

            if ($this->request->data['price'] == "") {
                $flag = false;
            }

            if ($this->request->data['mileage'] == "") {
                $flag = false;
            }

            if ($this->request->data['color'] == "") {
                $flag = false;
            }

            if ($this->request->data['fuel_type'] == "") {
                $flag = false;
            }

            if ($flag) {

                $products = $this->Products->patchEntity($products, $this->request->data);
                if ($this->Products->save($products)) {
                    //$productsimages = $this->Productsimages->newEntity();
                    //$products = $this->Products->patchEntity($products, $this->request->data); 
                    //$this->Flash->success(__('Products has been saved.'));

                    $file_image_name = explode(",", $this->request->data['image']);


                    if ($this->request->data['image'] != '') {
                        foreach ($file_image_name as $img) {


                            $this->request->data['product_id'] = urlencode(base64_decode($id));
                            $this->request->data['path'] = $img;
                            $spimage = $this->Productsimages->newEntity();
                            $spimage = $this->Productsimages->patchEntity($spimage, $this->request->data);

                            $this->Productsimages->save($spimage);
                        }
                    }
                } else {
                    $this->Flash->error(__('Products could not be saved. Please, try again.'));
                }
            } else {
                $this->Flash->error(__('Some fields are empty. Please, try again.'));
            }


            if ($flag) {
                $this->Flash->success(__('Products has been saved.'));
            }
            //return $this->redirect(['action' => 'index']);
        }
        $this->loadModel('Bikemodels');
        //echo $id;
        $all_image = $this->Productsimages->find('all')->where(['Productsimages.product_id' => urlencode(base64_decode($id))])->toArray();
        //print_r($all_image);
        // exit;
        $result = $this->Bikemodels->find('all');
        $this->set(compact('result', 'all_image'));
        $this->set(compact('products'));
    }

    public function deleteproduct($id = null) {
        $this->loadModel('Products');
        $products = $this->Products->get($id);
        if ($this->Products->delete($products)) {
            $this->Flash->success(__('Testimonials has been deleted.'));
        } else {
            $this->Flash->error(__('Testimonials could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function upload_photo_add() {


        //$this->viewBuilder()->autoRender(false);
        $this->viewBuilder()->layout(false);
        $filen = '';
        //print_r($_FILES);
        if (!empty($_FILES['files']['name'])) {

            $no_files = count($_FILES["files"]['name']);

            //echo $no_files;exit;
            for ($i = 0; $i < $no_files; $i++) {
                if ($_FILES["files"]["error"][$i] > 0) {
                    echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
                    //echo 'a';exit;
                } else {

                    $pathpart = pathinfo($_FILES["files"]["name"][$i]);
                    //echo $pathpart;exit;
                    $ext = $pathpart['extension'];
                    $uploadFolder = "product_img/";
                    $uploadPath = WWW_ROOT . $uploadFolder;
                    $filename = uniqid() . '.' . $ext;
                    $full_flg_path = $uploadPath . '/' . $filename;
                    if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $full_flg_path)) {
                        //echo $product_id;exit;
                        // $this->request->data['ProductImage']['product_id'] = $product_id;
                        //$this->request->data['ProductImage']['name'] = $filename;
                        //echo $filename,exit;
                        //$this->admin_resize($full_flg_path, $filename,$ext);

                        $file = array('filename' => $filename, 'last_id' => $i + 1);

                        if ($filen == '') {
                            $filen = $filename;
                        } else {
                            $filen = $filen . ',' . $filename;
                        }
                    }
                    $file_details[] = $file;
                }
            }
            $data = array('Ack' => 1, 'data' => $file_details, 'image_name' => $filen);
        } else {

            $data = array('Ack' => 0);
        }
        echo json_encode($data);
        exit();
    }

    public function delete_image() {

        $this->loadModel('Productsimages');
        $imageid = $this->Productsimages->get($_REQUEST['id']);
        //print_r($imageid);
        if ($this->Productsimages->delete($imageid)) {
            if ($imageid->path != "") {
                $filePathDel = WWW_ROOT . 'product_img' . DS . $imageid->path;
                if (file_exists($filePathDel)) {
                    unlink($filePathDel);
                }
            }
            $data = array('Ack' => 1);
        } else {
            $data = array('Ack' => 0);
        }
        // echo json_encode($data);
        exit();
    }

    public function addgear(){
        $this->viewBuilder()->layout('admin');
        $this->loadModel('Gears');
        $this->loadModel('Categories');
        $this->loadModel('Colours');
        $categories = $this->paginate($this->Categories);
        $colours = $this->paginate($this->Colours);
        $user = $this->Gears->newEntity();
        $this->set(compact('categories','colours','user'));

        if ($this->request->is('post')) {
            // echo "<pre>";
            // print_r($this->request->data);
            // exit();
            $flag = true;
            if ($this->request->data['category_id'] == "") {
                $this->Flash->error(__('Category can not be null. Please, try again.'));
                $flag = false;
            }
            if ($this->request->data['product_name'] == "") {
                $this->Flash->error(__('Product name can not be null. Please, try again.'));
                $flag = false;
            }
            if ($this->request->data['brand_id'] == "") {
                $this->Flash->error(__('Brand name can not be null. Please, try again.'));
                $flag = false;
            }
            if ($this->request->data['size_id'] == "") {
                $this->Flash->error(__('Size can not be null. Please, try again.'));
                $flag = false;
            }
            if ($this->request->data['price'] == "") {
                $this->Flash->error(__('Price can not be null. Please, try again.'));
                $flag = false;
            }
            if ($this->request->data['item_location'] == "") {
                $this->Flash->error(__('Item location can not be null. Please, try again.'));
                $flag = false;
            }

            $colour_array = array();
            $colour_array = $this->request->data('colour_id');
            if(sizeof($colour_array)){
                //$colour_array = $this->request->data('colour_id');
                //print_r($colour_array);
                
                foreach($colour_array as $colour_val){
                    $colour_value .= $colour_val.",";
                }
                $colour_value = rtrim($colour_value,",");
                $this->request->data['colour_id'] = $colour_value;
            }
            /*else{
                $colour_array = array();
            }*/

            if(empty($colour_array)){
                $this->Flash->error(__('Please select colour. Please, try again.'));
                $flag = false;
            }
            
            

            if($this->request->data['upload'] == ''){
                $this->Flash->error(__('Please upload pictures.'));
                $flag = false;
            }
            else{
                $this->request->data['upload'] = rtrim($this->request->data['upload'],",");
            }

            if($flag == true){
                $user = $this->Gears->patchEntity($user, $this->request->data);
                if ($this->Gears->save($user)) {
                    $this->Flash->success('Gears added successfully.', ['key' => 'success']);
                    //pr($this->request->data); pr($user); exit;
                    $this->redirect(['action' => 'listgear']);
                }
                else{
                    $this->Flash->error(__('Gears could not be added. Please, try again.'));
                    return $this->redirect(['action' => 'listgear']);
                }
            }
            else{
                $this->Flash->error(__('Gears could not be added. Please, try again.'));
                return $this->redirect(['action' => 'listgear']);
            }
        }
    }

    public function listgear(){
        $this->viewBuilder()->layout('admin');
        $this->loadModel('Users');
        $this->loadModel('Categories');
        $this->loadModel('Gears');

        $this->paginate = [
            'contain' => ['Categories'],
            'order' => [ 'id' => 'DESC']
        ];
        $gears = $this->paginate($this->Gears);

        $this->set(compact('gears','user'));
        $this->set('_serialize', ['gears']);
    }

    public function geardelete($id = null){
        $this->loadModel('Gears');
        $users = $this->Gears->get($id);
        
        if ($this->Gears->delete($users)) {
            $this->Flash->success(__('Gear deleted.'));
        } else {
            $this->Flash->error(__('Gear could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'listgear']);
    }

    public function gearajaxdata(){
        $this->loadModel('Attributes');
        $this->loadModel('Brands');
        $this->loadModel('Sizes');
        $category_id = $_REQUEST['category_id'];
        //$category_id = 25;
        $category_data = $this->Attributes->find()->where(['category_id' => $category_id])->toArray();

        $brand_ids = $category_data[0]['brand_ids'];
        $brand_id_array = explode(',', $brand_ids);
        
        $size_ids = $category_data[0]['size_ids'];
        $size_id_array = explode(',', $size_ids);
        

        //$brand = $this->Brands->find('all',array('conditions' => array('Brands.status' => 1 ,'FIND_IN_SET(\''. $brand_ids .'\',Brands.brand_name)')));

  //       echo $brand = $this->Brands->find('all', array(
        //     'conditions' => array('Brands.id' => $brand_ids)
        // ));

        $brand = $this->Brands->find()->where(['id IN' => $brand_id_array]);
        $brand_select = "<option value=\"\">Select</option>";
        foreach ($brand as $key) {
            //$brand_result_array[$key->id] = $key->brand_name;
            $brand_select .= "<option value=\"$key->id\">$key->brand_name</option>";
        }

        $size = $this->Sizes->find()->where(['id IN' => $size_id_array]);
        $size_select = "<option value=\"\">Select</option>";
        foreach ($size as $key) {
            //$size_result_array[$key->id] = $key->size;
            $size_select .= "<option value=\"$key->id\">$key->size</option>";
        }

        // $return_data['brand'] = $brand_result_array;
        // $return_data['size'] = $size_result_array;

        $return_data = $brand_select."|".$size_select;

        echo json_encode($return_data);
        
        exit();

    }

    public function upload_photo() {

        //$this->viewBuilder()->autoRender(false);
        $this->viewBuilder()->layout(false);
        $filen = '';
        //print_r($_FILES);
        if (!empty($_FILES['files']['name'])) {

            $no_files = count($_FILES["files"]['name']);

            //echo $no_files;exit;
            for ($i = 0; $i < $no_files; $i++) {
                if ($_FILES["files"]["error"][$i] > 0) {
                    echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
                    //echo 'a';exit;
                } else {

                    $pathpart = pathinfo($_FILES["files"]["name"][$i]);
                    //echo $pathpart;exit;
                    $ext = $pathpart['extension'];
                    $uploadFolder = "product_img";
                    $uploadPath = WWW_ROOT . $uploadFolder;
                    $filename = uniqid() . '.' . $ext;
                    $full_flg_path = $uploadPath . '/' . $filename;
                    if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $full_flg_path)) {
                        //echo $product_id;exit;
                        // $this->request->data['ProductImage']['product_id'] = $product_id;
                        //$this->request->data['ProductImage']['name'] = $filename;
                        //echo $filename,exit;
                        //$this->admin_resize($full_flg_path, $filename,$ext);

                        $file = array('filename' => $filename, 'last_id' => $i + 1);

                        if ($filen == '') {
                            $filen = $filename;
                        } else {
                            $filen = $filen . ',' . $filename;
                        }
                    }
                    $file_details[] = $file;
                }
            }
            $data = array('Ack' => 1, 'data' => $file_details, 'image_name' => $filen);
        } else {

            $data = array('Ack' => 0);
        }
        echo json_encode($data);
        exit();
    }

    public function delete_picture() {

        // $this->loadModel('Gears');
        // $imageid = $this->Productsimages->get($_REQUEST['id']);
        // print_r($imageid);
        // if ($this->Productsimages->delete($imageid)) {
        //     if ($imageid->path != "") {
        //         $filePathDel = WWW_ROOT . 'product_img' . DS . $imageid->path;exit();
        //         if (file_exists($filePathDel)) {
        //             unlink($filePathDel);
        //         }
        //     }
        //     $data = array('Ack' => 1);
        // } else {
        //     $data = array('Ack' => 0);
        // }
        // // echo json_encode($data);
        // exit();

        
        $image_name = str_replace("#", ".", $_REQUEST['id']);
        $filePathDel = WWW_ROOT . 'product_img' . DS . $image_name;

        if (file_exists($filePathDel)) {
            unlink($filePathDel);
            $data = array('Ack' => 1);
        }
        else{
            $data = array('Ack' => 0);
        }
        //$data = array('Ack' => 1);
        echo json_encode($data);
        exit();
    }

    public function editgear($id = null) {
        $this->viewBuilder()->layout('admin');
        $this->loadModel('Gears');
        $this->loadModel('Categories');
        $this->loadModel('Colours');
        $this->loadModel('Attributes');
        $this->loadModel('Brands');
        $this->loadModel('Sizes');

        $user = $this->Gears->get($id);
        $categories = $this->paginate($this->Categories);
        $colours = $this->paginate($this->Colours);

        // echo "<pre>";
        // print_r($colours);
        // exit();

        $category_id = $user->category_id;
        $brand_id = $user->brand_id;
        $size_id = $user->size_id;
        $colour_id = $user->colour_id;
        $colour_id_array = explode(',', $colour_id);
        $price = $user->price;
        $description = $user->description;
        $item_location = $user->item_location;
        $upload = $user->upload;
        $product_name = $user->product_name;

        $colour_html = '';
        foreach ($colours as $colour_key) {
            if(in_array($colour_key->hexcode, $colour_id_array))
                $colour_checked = ' checked';
            else
                $colour_checked = '';

            $colour_html .=  "<p class=\"text-center d-inline-block\"><input type=\"checkbox\" id=\"$colour_key->id\" name=\"colour_id[]\" value=\"$colour_key->hexcode\" $colour_checked />
                                      <label for=\"$colour_key->id\" style=\"background:$colour_key->hexcode\"></label></p>";
        }
        
        $category_html = "<select class=\"form-control\" id=\"category_idselect\" name=\"category_id\"><option value=\"\" >Select</option>";
        foreach ($categories as $cat_val) {
            if($cat_val->id == $category_id)
                $cat_selected = ' selected';
            else
                $cat_selected = '';
            $category_html .= "<option value=\"$cat_val->id\" $cat_selected>$cat_val->name</option>";
        }
        $category_html .= "</select>";

        $category_data = $this->Attributes->find()->where(['category_id' => $category_id])->toArray();

        $brand_ids = $category_data[0]['brand_ids'];
        $brand_id_array = explode(',', $brand_ids);
        
        $size_ids = $category_data[0]['size_ids'];
        $size_id_array = explode(',', $size_ids);

        $brand = $this->Brands->find()->where(['id IN' => $brand_id_array]);

        $brand_html = "<select class=\"form-control\" id=\"brand_idselect\" name=\"brand_id\"><option value=\"\" >Select</option>";
        foreach ($brand as $key) {
            //$brand_result_array[$key->id] = $key->brand_name;
            if($key->id == $brand_id)
                $brand_selected = ' selected';
            else
                $brand_selected = '';

            $brand_html .= "<option value=\"$key->id\" $brand_selected>$key->brand_name</option>";
        }
        $brand_html .= "</select>";
        
        $size = $this->Sizes->find()->where(['id IN' => $size_id_array]);
        $size_html = "<select class=\"form-control\" id=\"size_id_select\" name=\"size_id\"><option value=\"\" >Select</option>";
        foreach ($size as $key) {
            //$size_result_array[$key->id] = $key->size;
            if($key->id == $size_id)
                $size_selected = ' selected';
            else
                $size_selected = '';

            $size_html .= "<option value=\"$key->id\" $size_selected>$key->size</option>";
        }
        $size_html .= "</select>";

        $upload_hidden = $upload;
        $upload_html = '';
        $upload = explode(",", $upload);
        $total_image = '';
        if(sizeof($upload)){
            foreach ($upload as $uploadval) {
                if($uploadval == '')
                    break;
                $image_path = $this->request->webroot . 'product_img/' .$uploadval;
                $image_explode = explode(".", $uploadval);
                $list_id = "image_".$image_explode[0];
                $set_imageid = str_replace(".", "#", $uploadval);
                $upload_html .= "<li id=\"$list_id\"><img src=\"".$image_path."\" alt=\"\"><a onclick=\"javascript: delete_picture('".$set_imageid."')\"><i class=\"ion-close\"></i></a>";
                $total_image++;
            }
        }


        $return_data = $category_html."|".$product_name."|".$brand_html."|".$size_html."|".$colour_html."|".$price."|".$item_location."|".$description."|".$upload_html."|".$upload_hidden."|".$total_image;

        $this->set(compact('user','return_data'));
        $this->set('_serialize', ['user','return_data']);

        if ($this->request->is(['post', 'put'])) {

            // echo "<pre>";
            // print_r($this->request->data);
            // die;

            $flag = true;

            if ($this->request->data['category_id'] == "") {
                $this->Flash->error(__('Category can not be null. Please, try again.'));
                $flag = false;
            }
            if ($this->request->data['product_name'] == "") {
                $this->Flash->error(__('Product name can not be null. Please, try again.'));
                $flag = false;
            }
            if ($this->request->data['brand_id'] == "") {
                $this->Flash->error(__('Brand name can not be null. Please, try again.'));
                $flag = false;
            }
            if ($this->request->data['size_id'] == "") {
                $this->Flash->error(__('Size can not be null. Please, try again.'));
                $flag = false;
            }
            if ($this->request->data['price'] == "") {
                $this->Flash->error(__('Price can not be null. Please, try again.'));
                $flag = false;
            }
            if ($this->request->data['item_location'] == "") {
                $this->Flash->error(__('Item location can not be null. Please, try again.'));
                $flag = false;
            }

            $colour_array = array();
            $colour_array = $this->request->data('colour_id');

            if(sizeof($colour_array)){
                $colour_value = '';
                foreach($colour_array as $colour_val){
                    $colour_value .= $colour_val.",";
                }
                
                $colour_value = rtrim($colour_value,",");
                $this->request->data['colour_id'] = $colour_value;
            }
            
            if(empty($colour_array)){
                $this->Flash->error(__('Please provide colour.'));
                $flag = false;
            }
             
            if($this->request->data['upload'] == ''){
                $this->Flash->error(__('Please upload pictures.'));
                $flag = false;
            }
            else{
                $this->request->data['upload'] = rtrim($this->request->data['upload'],",");
            }


            if($flag == true){
                $user = $this->Gears->patchEntity($user, $this->request->data);
            
                if ($this->Gears->save($user)) {
                    $this->Flash->success('Gears edited successfully.', ['key' => 'success']);
                    //pr($this->request->data); pr($user); exit;
                    $this->redirect(['action' => 'listgear']);
                }
                else{
                    $this->Flash->error(__('Gears could not be edited. Please, try again.'));
                    return $this->redirect(['action' => 'listgear']);
                }
            }
            else{
                $this->Flash->error(__('Gears could not be edited. Please, try again.'));
                return $this->redirect(['action' => 'listgear']);
            }
            
        }
    }

}
