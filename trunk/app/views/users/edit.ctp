	<?php
		echo $this->Form->create("User");
		echo $this->Form->hidden('id');
		echo $this->Form->input('name',array('label'=>'Tên nhân sự'));
		echo $this->Form->input('username',array('label'=>'Tài khoản đăng nhập','readonly'=>'readonly'));		
		echo $this->Form->input('groups_id',array('label'=>'Phòng ban'));
		echo $this->Form->input('positions_id',array('label'=>'Chức vụ'));
		echo $this->Form->end('Lưu lại');
	?>
	<script type="text/javascript">var title = "Cập nhật thông tin nhân sự";</script>