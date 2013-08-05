<?php
if($this->session->flashdata('ConnectionError')):
   echo $this->session->flashdata('ConnectionError') . '<br>';
endif;
//echo validation_errors();
echo form_open('welcome/login');
echo form_label('Login: ');
echo form_input(array('name'=>'username'),'','autofocus') . '<br>';
echo form_label('Senha: ');
echo form_password(array('name'=>'password')) . '<br>';
echo form_submit(array('name'=>'Login',"value"=>'Login'));
echo form_close();
?>
