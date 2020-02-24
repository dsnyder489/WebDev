<?php
// get task_list array from POST
$customerList = filter_input(INPUT_POST, 'customerList', FILTER_DEFAULT,
                          FILTER_REQUIRE_ARRAY);
if ($customerList === NULL) {
  $customerList = array();
}

// get action variable from POST
$action = filter_input(INPUT_POST, 'action');

// initialize error array
$errors = array();

// process
switch( $action ) {
    case 'Add Customer':
        $new_cust = filter_input(INPUT_POST, 'customer');
        if (empty($new_cust)) {
            $errors[] = 'The new customer cannot be empty.';
        } else {
            $customerList[] = $new_cust;
        }
        break;
    case 'Delete':
        $cust_index = filter_input(INPUT_POST, 'custid', FILTER_VALIDATE_INT);
        if ($cust_index === NULL || $cust_index === FALSE) {
            $errors[] = 'The customer cannot be deleted.';
        } else {
           unset($customerList[$cust_index]);
           $customerList = array_values($customerList);
        }
        break;
    case 'Modify':
        $cust_index = filter_input(INPUT_POST, 'custid', FILTER_VALIDATE_INT);
        if ($cust_index === NULL || $cust_index === FALSE) {
            $errors[] = 'The customer cannot be modified.';
        } else {
            $cust_to_mod = $customerList[$cust_index];
        }
        break;
    case 'Save':
        $cust_index = filter_input(INPUT_POST,'ModifyID');
        $cust_name = filter_input(INPUT_POST, 'ModifyCust');
        $customerList[$cust_index] = $cust_name;
        break;
    case 'Cancel':
    }
    include('displayCustomer.php');
?>
