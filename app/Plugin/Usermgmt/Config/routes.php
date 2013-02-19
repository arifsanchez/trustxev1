<?php
/*

Cakephp 2.x User Management Premium Version (a product of Ekta Softwares)
Ekta Softwares is a division of Ektanjali Softwares Pvt Ltd
Website- http://EktaSoftwares.com
Plugin Demo- http://umpremium.ektasoftwares.com
Author- Chetan Varshney (The Director of Ektanjali Softwares Pvt Ltd)
Plugin Copyright No- 11498/2012-CO/L

UMPremium is a copyrighted work of authorship. Chetan Varshney retains ownership of the product and any copies of it, regardless of the form in which the copies may exist. This license is not a sale of the original product or any copies.

By installing and using UMPremium on your server, you agree to the following terms and conditions. Such agreement is either on your own behalf or on behalf of any corporate entity which employs you or which you represent ('Corporate Licensee'). In this Agreement, 'you' includes both the reader and any Corporate Licensee and Chetan Varshney.

The Product is licensed only to you. You may not rent, lease, sublicense, sell, assign, pledge, transfer or otherwise dispose of the Product in any form, on
a temporary or permanent basis, without the prior written consent of Chetan Varshney.

The Product source code may be altered (at your risk)

All Product copyright notices within the scripts must remain unchanged (and visible).

If any of the terms of this Agreement are violated, Chetan Varshney reserves the right to action against you.

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Product.

THE PRODUCT IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE PRODUCT OR THE USE OR OTHER DEALINGS IN THE PRODUCT.

*/

// Routes for standard actions
App::uses('SlugRoute', 'Usermgmt.routes');
Router::connect('/:slug', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'viewProfile'), array('routeClass' => 'SlugRoute'));
Router::connect('/login/*', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'login'));
Router::connect('/logout', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'logout'));
Router::connect('/forgotPassword', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'forgotPassword'));
Router::connect('/emailVerification', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'emailVerification'));
Router::connect('/activatePassword/*', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'activatePassword'));
Router::connect('/register', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'register'));
Router::connect('/changePassword', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'changePassword'));
Router::connect('/changeUserPassword/*', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'changeUserPassword'));
Router::connect('/addUser', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'addUser'));
Router::connect('/editUser/*', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'editUser'));
Router::connect('/logoutUser/*', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'logoutUser'));
Router::connect('/viewUser/*', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'viewUser'));
Router::connect('/userVerification/*', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'userVerification'));
Router::connect('/allUsers', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'index'));
Router::connect('/history', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'history'));
Router::connect('/myec', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'myecurr'));
Router::connect('/dashboard', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'dashboard'));
Router::connect('/permissions', array('plugin' => 'usermgmt', 'controller' => 'user_group_permissions', 'action' => 'index'));
Router::connect('/update_permission', array('plugin' => 'usermgmt', 'controller' => 'user_group_permissions', 'action' => 'update'));
Router::connect('/accessDenied', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'accessDenied'));
Router::connect('/myprofile', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'myprofile'));
Router::connect('/allGroups', array('plugin' => 'usermgmt', 'controller' => 'user_groups', 'action' => 'index'));
Router::connect('/addGroup', array('plugin' => 'usermgmt', 'controller' => 'user_groups', 'action' => 'addGroup'));
Router::connect('/editGroup/*', array('plugin' => 'usermgmt', 'controller' => 'user_groups', 'action' => 'editGroup'));
Router::connect('/allSettings', array('plugin' => 'usermgmt', 'controller' => 'user_settings', 'action'   => 'index'));
Router::connect('/editSetting/*', array('plugin' => 'usermgmt', 'controller' => 'user_settings', 'action' => 'editSetting'));
Router::connect('/editProfile', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'editProfile'));
Router::connect('/usersOnline', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'online'));
Router::connect('/deleteCache', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'deleteCache'));
Router::connect('/viewUserPermissions/*', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'viewUserPermissions'));
Router::connect('/sendMails/*', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'sendMails'));
Router::connect('/searchEmails/*', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'searchEmails'));
Router::connect('/contactUs', array('plugin' => 'usermgmt', 'controller' => 'user_contacts', 'action' => 'contactUs'));
Router::connect('/allContacts', array('plugin' => 'usermgmt', 'controller' => 'user_contacts', 'action' => 'index'));
Router::connect('/allPages', array('plugin' => 'usermgmt', 'controller' => 'contents', 'action' => 'index'));
Router::connect('/addPage', array('plugin' => 'usermgmt', 'controller' => 'contents', 'action' => 'addPage'));
Router::connect('/editPage/*', array('plugin' => 'usermgmt', 'controller' => 'contents', 'action' => 'editPage'));
Router::connect('/viewPage/*', array('plugin' => 'usermgmt', 'controller' => 'contents', 'action' => 'viewPage'));
Router::connect('/contents/*', array('plugin' => 'usermgmt', 'controller' => 'contents', 'action' => 'content'));