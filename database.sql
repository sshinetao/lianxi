drop table if exists thinkphp_Article;

drop table if exists thinkphp_Category;

drop table if exists thinkphp_Tag;

drop table if exists thinkphp_Tag_Article_R;

drop table if exists thinkphp_User;

/*==============================================================*/
/* Table: Article                                               */
/*==============================================================*/
create table thinkphp_Article
(
  id                   int unsigned not null auto_increment comment '主键',
  uid                  int comment '用户id',
  cid                  int comment '分类',
  ctime                int(20) comment '发布时间',
  title                varchar(50) comment '标题',
  summary              varchar(100) comment '摘要',
  content              text comment '内容',
  iscanuse             bit default 1 comment '是否可用',
  porder               int comment '排序',
  primary key (id)
)
  ENGINE = MYISAM
  DEFAULT CHARACTER SET = utf8
  COLLATE = utf8_general_ci;

alter table thinkphp_Article comment '文章';

/*==============================================================*/
/* Table: Category                                              */
/*==============================================================*/
create table thinkphp_Category
(
  id                   int unsigned not null auto_increment comment '主键',
  pid                  int comment '父级id',
  name                 varchar(50) comment '分类名',
  description          varchar(500) comment '描述',
  iscanuse             bit default 1 comment '是否可用',
  porder               int comment '排序',
  primary key (id)
)
  ENGINE = MYISAM
  DEFAULT CHARACTER SET = utf8
  COLLATE = utf8_general_ci;

alter table thinkphp_Category comment '分类';

/*==============================================================*/
/* Table: Tag                                                   */
/*==============================================================*/
create table thinkphp_Tag
(
  id                   int unsigned not null auto_increment comment '主键',
  name                 varchar(50) comment '标签名',
  description          varchar(500) comment '描述',
  iscanuse             bit default 1 comment '是否可用',
  porder               int comment '排序',
  primary key (id)
)
  ENGINE = MYISAM
  DEFAULT CHARACTER SET = utf8
  COLLATE = utf8_general_ci;

alter table thinkphp_Tag comment '标签';

/*==============================================================*/
/* Table: Tag_Article_R                                         */
/*==============================================================*/
create table thinkphp_Tag_Article_R
(
  id                   int unsigned not null auto_increment comment '主键',
  tid                  int comment '标签id',
  aid                  int comment '文章id',
  primary key (id)
)
  ENGINE = MYISAM
  DEFAULT CHARACTER SET = utf8
  COLLATE = utf8_general_ci;

alter table thinkphp_Tag_Article_R comment '标签文章关系表';

/*==============================================================*/
/* Table: User                                                  */
/*==============================================================*/
create table thinkphp_User
(
  id                   int unsigned not null auto_increment comment '主键',
  name                 varchar(50) comment '用户名',
  password             varchar(32) comment '密码',
  sex                  tinyint(1) comment '性别',
  avatar               varchar(500) comment '头像',
  iscanuse             bit default 1 comment '是否可用',
  birthday             int(20) comment '出生日期',
  primary key (id)
)
  auto_increment = 100
  ENGINE = MYISAM
  DEFAULT CHARACTER SET = utf8
  COLLATE = utf8_general_ci;

alter table thinkphp_User comment '用户';
