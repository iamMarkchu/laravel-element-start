## laravel element 初始项目

### 项目开发流程

1. 在 router/routes里面 新加路由
2. 新建 views/pageName/Add.vue, views/pageName/Edit.vue
3. 新建 views/pageName/components/pageNameDetail.vue, 写 form 表单逻辑
4. 新建 api/pageNames.js, 填入 api逻辑
5. php artisan make:controller Admin/PagenameController --resource，写入方法
6. php artisan make:model Models/Pagename
7. 
