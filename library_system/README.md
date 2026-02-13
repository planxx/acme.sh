# ThinkPHP 图书馆管理系统

> 由于当前环境无法访问 Packagist/GitHub（网络 403），无法直接 `composer create-project topthink/think`。本目录提供了 **ThinkPHP 约定结构** 的完整业务代码，你可以在可联网环境中初始化 ThinkPHP 后直接拷贝 `app/`、`route/`、`config/`、`database/` 目录使用。

## 功能
- 图书入库（新增、列表、库存展示）
- 借书管理（创建借阅、借阅列表）
- 还书管理（归还图书、状态更新）

## 快速接入步骤（在可联网环境）
1. 初始化 ThinkPHP 项目：
   ```bash
   composer create-project topthink/think library_system
   ```
2. 拷贝本仓库下对应目录到项目：
   - `app/`
   - `route/`
   - `config/database.php`
   - `database/migrations/*.sql`
3. 创建数据库并执行：`database/migrations/001_create_tables.sql`
4. 启动：
   ```bash
   php think run
   ```

## 路由
- `GET /books` 图书列表
- `GET /books/create` 入库页面
- `POST /books` 新增图书
- `GET /borrows` 借阅列表
- `GET /borrows/create` 借书页面
- `POST /borrows` 借书
- `POST /borrows/:id/return` 还书

## 数据库说明
- `books`
  - `total_stock` 总库存
  - `available_stock` 可借库存
- `borrows`
  - `status`：`borrowed` / `returned`
  - `borrowed_at` 借出时间
  - `returned_at` 归还时间
