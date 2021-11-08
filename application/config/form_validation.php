<?php

$config = [


		'add_article_rules' => 
		[
			[
				'field' => 'user_name',
				'label' => 'User Name',
				'rules'  => 'required|trim'
			],
			[
				'field' => 'email',
				'label' => 'Email',
				'rules'  => 'required|trim'
			],
			[
				'field' => 'mobile',
				'label' => 'Mobile Number',
				'rules'  => 'required|trim'
			]	
		],

		'add_payment_rules' => 
		[
			
			[
				'field' => 'payment',
				'label' => 'Payment Amount: Taka',
				'rules'  => 'required|trim'
			],
			[
				'field' => 'due_payment',
				'label' => 'Due Payment',
				'rules'  => 'required|trim'
			],
		],

		'add_debit_rules' => 
		[
			
			[
				'field' => 'debit',
				'label' => 'Debit Amount: Taka',
				'rules'  => 'required|trim'
			],
			[
				'field' => 'current_balance',
				'label' => 'Current Balance',
				'rules'  => 'required|trim'
			],
		],

		'add_credit_rules' => 
		[
			
			[
				'field' => 'credit',
				'label' => 'Credit Amount: Taka',
				'rules'  => 'required|trim'
			],
			[
				'field' => 'current_balance',
				'label' => 'Current Balance',
				'rules'  => 'required|trim'
			],
		],

		'add_savings_rules' => 
		[
			
			[
				'field' => 's_account',
				'label' => 'Savings Number:',
				'rules'  => 'required|trim'
			],
			[
				'field' => 'amount',
				'label' => 'Savings Amount: Taka',
				'rules'  => 'required|trim'
			],

			[
				'field' => 'user_id',
				'label' => 'User Account ID (Required) *',
				'rules'  => 'required|trim'
			],
			
		],


		'add_loan_rules' => 
		[
			
			[
				'field' => 'amount',
				'label' => 'Principle Amount',
				'rules'  => 'required|trim'
			],
			[
				'field' => 'installment',
				'label' => 'Installment',
				'rules'  => 'required|trim'
			],
			[
				'field' => 'interest_rate',
				'label' => 'Interest Rate (%)',
				'rules'  => 'required|trim'
			],
			[
				'field' => 'months',
				'label' => 'Number of Days/Weeks/Months/Years',
				'rules'  => 'required|trim'
			],
			[
				'field' => 'interest_amount',
				'label' => 'Interest Amount',
				'rules'  => 'required|trim'
			],
			[
				'field' => 'total',
				'label' => 'Total Amount',
				'rules'  => 'required|trim'
			],
			[
				'field' => 'monthly_payment',
				'label' => 'Monthly Payment',
				'rules'  => 'required|trim'
			],
			

		],

		'add_savings_rules' => 
		[
			[
				'field' => 'user_id',
				'label' => 'User Account ID (Required) *',
				'rules'  => 'required|trim'
			],
			[
				'field' => 's_account',
				'label' => 'Savings Number',
				'rules'  => 'required|trim'
			],
			
			[
				'field' => 'amount',
				'label' => 'Principle Savings Amount',
				'rules'  => 'required|trim'
			],
			[
				'field' => 'installment',
				'label' => 'Installment',
				'rules'  => 'required|trim'
			],
			[
				'field' => 'interest_rate',
				'label' => 'Interest Rate (%)',
				'rules'  => 'required|trim'
			],
			[
				'field' => 'months',
				'label' => 'Installment (Days/Months/Years)',
				'rules'  => 'required|trim'
			],
			[
				'field' => 'interest_amount',
				'label' => 'Interest Amount',
				'rules'  => 'required|trim'
			],
			[
				'field' => 'total',
				'label' => 'Total Amount',
				'rules'  => 'required|trim'
			],
			[
				'field' => 'monthly_payment',
				'label' => 'Monthly Payment',
				'rules'  => 'required|trim'
			],

			[
				'field' => 'current_balance',
				'label' => 'Current Balance',
				'rules'  => 'required|trim'
			],
			

		],

		'admin_login' => 
		[
			[
				'field' => 'username',
				'label' => 'User Name',
				'rules'  => 'trim|required|min_length[3]|max_length[20]'
			],
			[
				'field' => 'password',
				'label' => 'Password',
				'rules'  => 'trim|required|min_length[3]'
			]	
		],


		'add_user_rules' => 
		[
			[
				'field' => 'ac_no',
				'label' => 'A/C Number',
				'rules'  => 'required|trim|is_unique[user.ac_no]'
			]
		],


		'add_admin_rules' => 
		[
			[
				'field' => 'first_name',
				'label' => 'First Name',
				'rules'  => 'required|trim'
			],
			[
				'field' => 'last_name',
				'label' => 'Last Name',
				'rules'  => 'required|trim'
			],
			[
				'field' => 'email',
				'label' => 'Email',
				'rules'  => 'required|trim'
			],
			[
				'field' => 'username',
				'label' => 'User Name',
				'rules'  => 'required|trim'
			],
			[
				'field' => 'password',
				'label' => 'Password',
				'rules'  => 'required|trim'
			]
			// [
			// 	'field' => 'confirm_password',
			// 	'label' => 'Confirm Password',
			// 	'rules'  => 'required|trim'
			// ]	
		],

];




?>