import  { createRouter ,createWebHistory } from 'vue-router';

import Home from './components/home.vue';
import login from './components/auth/login.vue';
import register from './components/auth/register.vue';
import forget from './components/auth/forget.vue';
import logout from './components/auth/logout.vue';


//employee component
import storeemploee from './components/employee/create.vue';
import indexemploee from './components/employee/index.vue';
import editemploee from './components/employee/edit.vue';

//employee component
import storesupplier from './components/supplier/create.vue';
import indexsupplier from './components/supplier/index.vue';
import editsupplier from './components/supplier/edit.vue';

//employee component
import storecategorie from './components/categorie/create.vue';
import indexcategorie from './components/categorie/index.vue';
import editcategorie from './components/categorie/edit.vue';

//product component
import storeproduct from './components/product/create.vue';
import indexproduct from './components/product/index.vue';
import editproduct from './components/product/edit.vue';

//expense component
import storeexpense from './components/expense/create.vue';
import indexexpense from './components/expense/index.vue';
import editexpense from './components/expense/edit.vue';

  // Salary Component 
  import salary from './components/salary/all_employee.vue';
  import paysalary from './components/salary/create.vue';
  import allsalary from'./components/salary/index.vue';
  import viewsalary from'./components/salary/view.vue';
  import editsalary from'./components/salary/edit.vue';
//    // Stock Component 
import stock from './components/product/stock.vue';
import editstock from './components/product/edit-stock.vue';
 
//  // Customer Component  
import storecustomer from './components/customer/create.vue';
import customer from './components/customer/index.vue';
import editcustomer from './components/customer/edit.vue';


// // POS Component
import pos from './components/pos/pointofsale.vue';

// // Order Component
import order from './components/order/order.vue';
import vieworder from './components/order/vieworder.vue';
import searchorder from './components/order/search.vue';
const routes =[
    {path:'/',  name:'/',component:login,},
    {path:'/logout',name:'logout',component:logout,},
    { path:'/home',name:'home',component:Home,},
    {path:'/register',name:'register',component:register,},
    {path:'/forget',name:'forget',component:forget,},

    //Employee Routes
    {path:'/store-employee',name:'storeemploee',component:storeemploee,},
    {path:'/index-employee',name:'indexemploee',component:indexemploee,},
    {path:'/edit-employee/:id',name:'editemploee',component:editemploee,},

    //supplier Routes
    {path:'/store-supplier',name:'storesupplier',component:storesupplier,},
    {path:'/index-supplier',name:'indexsupplier',component:indexsupplier,},
    {path:'/edit-supplier/:id',name:'editsupplier',component:editsupplier,},

     //categorie Routes
     {path:'/store-categorie',name:'storecategorie',component:storecategorie,},
     {path:'/index-categorie',name:'indexcategorie',component:indexcategorie,},
     {path:'/edit-categorie/:id',name:'editcategorie',component:editcategorie,},


 //product Routes
 {path:'/store-product',name:'storeproduct',component:storeproduct,},
 {path:'/index-product',name:'indexproduct',component:indexproduct,},
 {path:'/edit-product/:id',name:'editproduct',component:editproduct,},

  //expense Routes
  {path:'/store-expense',name:'storeexpense',component:storeexpense,},
  {path:'/index-expense',name:'indexexpense',component:indexexpense,},
  {path:'/edit-expense/:id',name:'editexpense',component:editexpense,},

  
// Salary Routes
{ path: '/given-salary', component: salary, name:'given-salary'},
{ path: '/pay-salary/:id', component: paysalary, name:'pay-salary'},

{ path: '/salary', component: allsalary, name:'salary'},
{ path: '/view-salary/:id', component: viewsalary, name:'view-salary'},
{ path: '/edit-salary/:id', component: editsalary, name:'edit-salary'},

// // Stock Routes
{ path: '/stock', component: stock, name:'stock'},
{ path: '/edit-stock/:id', component: editstock, name:'edit-stock'},

// // Customer Routes
{ path: '/store-customer', component: storecustomer, name:'store-customer'},
{ path: '/customer', component: customer, name:'customer'},
{ path: '/edit-customer/:id', component: editcustomer, name:'edit-customer'},
 
// // POS Routes 
{ path: '/pos', component: pos, name:'pos'},

// // Order Routes
{ path: '/order', component: order, name:'order'},
{ path: '/view-order/:id', component: vieworder, name:'view-order'},
{ path: '/searchorder', component: searchorder, name:'searchorder'},




];


const router= createRouter({
    history:createWebHistory(import.meta.env.BASE_URL),
    routes,
});
export  default router;


