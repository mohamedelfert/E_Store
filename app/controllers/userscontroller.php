<?php

namespace PHPMVC\Controllers;
use PHPMVC\LIB\Helper;
use PHPMVC\Lib\InputFilter;
use PHPMVC\Models\UsersModel;

class UsersController extends AbstractController
{
    use InputFilter;
    use Helper;

    public function defaultAction(){
        $this->language->load('template.common');
        $this->language->load('users.default');
        $this ->_data ['users'] = UsersModel::getAll();
        $this->_view();
    }

//    public function addAction(){
//        $this->_language->load('template.common');
//        $this->_language->load('employee.default');
//        if (isset($_POST['submit'])){
//            $emp = new EmployeesModel();
//            $emp ->name    = $this->filterString($_POST['name']) ;
//            $emp ->age     = $this->filterInteger($_POST['age']) ;
//            $emp ->address = $this->filterString($_POST['address']) ;
//            $emp ->salary  = $this->filterFloat($_POST['salary']) ;
//            $emp ->tax     = $this->filterFloat($_POST['tax']) ;
//            $emp ->gender  = $this->filterInteger($_POST['gender']) ;
//            $emp ->shift   = $this->filterInteger($_POST['shift']) ;
//            $emp ->notes   = $this->filterString($_POST['notes']) ;
//
//            if ($emp->save()){
//                $_SESSION['success'] = '<div style="background: #5bf728;padding: 5px;text-align: center"><b> Employee, Inserted Successfully :) </b></div>';
//                $this->redirect('/employees');
//            }else{
//                $_SESSION['error'] = '<div style="background: red;padding: 5px;text-align: center"><b> Error Inserting Employee :( </b></div>';
//                $this->redirect('/employees');
//            }
//        }
//        $this->_view();
//    }
//
//    public function editAction(){
//        $this->_language->load('template.common');
//        $this->_language->load('employee.default');
//        $id = $this->filterInteger($this->_params[0]);
//        $emp = EmployeesModel::getByPk($id);
//        if ($emp === false){
//            $this->redirect('/employees');
//        }
//        $this->_data['employees'] = $emp;
//        if (isset($_POST['submit'])){
//            $emp ->name    = $this->filterString($_POST['name']) ;
//            $emp ->age     = $this->filterInteger($_POST['age']) ;
//            $emp ->address = $this->filterString($_POST['address']) ;
//            $emp ->salary  = $this->filterFloat($_POST['salary']) ;
//            $emp ->tax     = $this->filterFloat($_POST['tax']) ;
//            $emp ->gender  = $this->filterInteger($_POST['gender']) ;
//            $emp ->shift   = $this->filterInteger($_POST['shift']) ;
//            $emp ->notes   = $this->filterString($_POST['notes']) ;
//
//            if ($emp->save()){
//                $_SESSION['success'] = '<div style="background: #5bf728;padding: 5px;text-align: center"><b> Employee, Inserted Successfully :) </b></div>';
//                $this->redirect('/employees');
//            }else{
//                $_SESSION['error'] = '<div style="background: red;padding: 5px;text-align: center"><b> Error Inserting Employee :( </b></div>';
//                $this->redirect('/employees');
//            }
//        }
//        $this->_view();
//    }
//
//    public function deleteAction(){
//        $id = $this->filterInteger($this->_params[0]);
//        $emp = EmployeesModel::getByPk($id);
//        if ($emp === false){
//            $this->redirect('/employees');
//        }
//        $this->_data['employees'] = $emp;
//        if ($emp->delete()){
//            $_SESSION['success'] = '<div style="background: #5bf728;padding: 5px;text-align: center"><b> Employee, Deleted Successfully :) </b></div>';
//            $this->redirect('/employees');
//        }else{
//            $_SESSION['error'] = '<div style="background: red;padding: 5px;text-align: center"><b> Error Deleting Employee :( </b></div>';
//            $this->redirect('/employees');
//        }
//
//        $this->_view();
//    }
}