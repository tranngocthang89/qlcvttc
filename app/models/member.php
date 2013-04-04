<?php
class Member extends AppModel {
	var $name = 'Member';
	var $displayField = 'name';
	var $actsAs = array('Acl' => array('type' => 'requester'));
	var $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Bạn chưa nhập họ tên nhân sụ',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty','unique'),
				'message' => array('Tài khoản không được để trống','Tài khoản đã tồn tại'),
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Mật khẩu không được để trống',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'positions_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Bạn chưa chọn chức vụ',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'groups_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Bạn chưa chọn phòng ban',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(

		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'groups_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Position' => array(
			'className' => 'Position',
			'foreignKey' => 'positions_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	var $hasMany = array(
		'Task' => array(
			'className' => 'Task',
			'foreignKey' => 'members_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Usertask' => array(
			'className' => 'Usertask',
			'foreignKey' => 'members_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	function parentNode() {
	    if (!$this->id && empty($this->data)) {
	        return null;
	    }
	    if (isset($this->data['User']['groups_id'])) {
	    	$groupId = $this->data['User']['groups_id'];
	    } else {
	        $groupId = $this->field('groups_id');
	    }
	    if (!$groupId) {
	    return null;
	    } else {
	        return array('Group' => array('id' => $groupId));
	    }
	}
}
