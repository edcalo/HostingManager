/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     2/28/2013 5:32:42 PM                         */
/*==============================================================*/


drop table if exists servers_services;

drop table if exists account_access;

drop table if exists account_activities;

drop table if exists accounts;

drop table if exists quota_limits;

drop table if exists quota_tallies;

drop table if exists servers;

drop table if exists services;

drop table if exists users;

/*==============================================================*/
/* Table: servers_services                                      */
/*==============================================================*/
create table servers_services
(
   server_id            int not null,
   service_id           int not null
);

/*==============================================================*/
/* Table: account_access                                        */
/*==============================================================*/
create table account_access
(
   id                   int unsigned not null auto_increment,
   account_name         varchar(32) not null,
   host                 varchar(20) not null,
   date                 date not null,
   action               char(10) not null,
   primary key (id)
);

/*==============================================================*/
/* Table: account_activities                                    */
/*==============================================================*/
create table account_activities
(
   id                   int unsigned not null auto_increment,
   account_name         varchar(32) not null,
   host                 varchar(20) not null,
   date                 date not null,
   detail_activity      text not null,
   primary key (id)
);

/*==============================================================*/
/* Table: accounts                                              */
/*==============================================================*/
create table accounts
(
   id                   int unsigned not null auto_increment,
   user_id              int not null,
   server_id            int not null,
   account_name         varchar(20),
   account_description  text,
   account_password     char(40),
   uid                  int not null default 2000,
   gid                  int not null default 2000,
   home_dir             varchar(255),
   shell                varchar(50),
   count                int not null default 0,
   accessed             timestamp not null default '0000-00-00 00:00:00',
   modified             timestamp not null,
   expired              timestamp default '0000-00-00 00:00:00',
   status               enum('expired','enable','disable','quota_exeded')  not null default 'enable',
   is_delete            bool not null default 0,
   primary key (id)
);

/*==============================================================*/
/* Table: quota_limits                                          */
/*==============================================================*/
create table quota_limits
(
   id                   int unsigned not null auto_increment,
   account_id           int not null,
   account_name         varchar(32) not null,
   quota_type           enum('user','group','class','all') not null default 'user',
   per_session          enum('false','true') not null default 'false',
   limit_type           enum('soft','hard') not null default 'soft',
   bytes_in_avail       int not null default 104857600,
   bytes_out_avail      int not null default 0,
   bytes_xfer_avail     int not null default 0,
   files_in_avail       int not null default 0,
   files_out_avail      int not null default 0,
   files_xfer_avail     int default 0,
   primary key (id)
);

/*==============================================================*/
/* Table: quota_tallies                                         */
/*==============================================================*/
create table quota_tallies
(
   id                   int unsigned not null auto_increment,
   account_id           int not null,
   account_name         varchar(32) not null,
   bytes_in_used        int not null default 0,
   bytes_out_used       int not null default 0,
   files_in_used        int not null default 0,
   files_out_userd      int not null default 0,
   files_xfer_used      int not null default 0,
   primary key (id)
);

/*==============================================================*/
/* Table: servers                                               */
/*==============================================================*/
create table servers
(
   id                   int unsigned not null auto_increment,
   server_name          varchar(20) not null,
   fully_qualified_domain_name varchar(255) not null,
   work_dir             varchar(255) not null,
   ip                   varchar(15) not null,
   server_description   text,
   is_active            bool not null default 1,
   is_delete            bool not null default 0,
   primary key (id)
);

/*==============================================================*/
/* Table: services                                              */
/*==============================================================*/
create table services
(
   id                   int not null auto_increment,
   service_name         varchar(50) not null,
   service_description  text,
   service_port         int not null,
   is_delete            bool not null default 0,
   image                varchar(255),
   primary key (id)
);

/*==============================================================*/
/* Table: users                                                 */
/*==============================================================*/
create table users
(
   id                   int unsigned not null auto_increment,
   user_name            varchar(50) not null,
   title                varchar(20),
   first_name           varchar(50) not null,
   last_name            varchar(50),
   email                varchar(50) not null,
   phone                varchar(30),
   created              date not null,
   modified             timestamp not null,
   status               int not null default 1,
   photo                varchar(255),
   is_delete            bool not null default 0,
   primary key (id)
);

alter table servers_services add constraint fk_servers_services foreign key (server_id)
      references servers (id) on delete restrict on update restrict;

alter table servers_services add constraint fk_servers_services foreign key (service_id)
      references services (id) on delete restrict on update restrict;

alter table accounts add constraint fk_accounts_servers foreign key (server_id)
      references servers (id) on delete restrict on update restrict;

alter table accounts add constraint fk_have_accounts foreign key (user_id)
      references users (id) on delete restrict on update restrict;

alter table quota_limits add constraint fk_account_quota foreign key (account_id)
      references accounts (id) on delete restrict on update restrict;

alter table quota_tallies add constraint fk_account_tallies foreign key (account_id)
      references accounts (id) on delete restrict on update restrict;

