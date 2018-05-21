<?php
	$userid = $this->request->session()->read('Auth.User.id');
	$admin_checkid = $this->request->session()->read('Auth.User.is_admin');
	$base_url= "http://localhost/bike/";

	echo $this->element('head');
	echo $this->element('header');
?> 
	<section>
		<div>
			<?php echo $this->Flash->render() ?>
			<?php echo $this->Flash->render('success') ?>
			<?php echo $this->Flash->render('error') ?>
		</div>
	</section> 

	<?php echo $this->fetch('content');?>
    <?php echo $this->element('footer');?>    
    
       
    <script>
        $(document).ready(function() {
            $(".more-btn").click(function() {
                $(this).parent().toggleClass("show-all")
            });
            $(".less-btn").click(function() {
                $(this).parent().parent().removeClass("show-all")
            });
        });
    </script>
</body>

</html>
