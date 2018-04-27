# 基于树莓派的人脸识别云检测系统

## 树莓派部分

> 由于树莓派的相当于一个微型的计算机，但是其i/o可以很灵活的进行设置，树莓派默认所使用的系统是使用Debian的内核，所以说，包管理相当的方便，可以快速的开发和投入使用，所以可以更好的做一个嵌入式的开发，这是我们选树莓派作为硬件的开发原因。


#### 1.OpenCV环境的构建

我们所使用OpenCV的版本是3.30为了避免编译参数的问题，我们选择从源代码中构建OpenCV的环境，当然在编译之前我们安装了以下包，使用apt-get可以非常方便的进行安装
```shell
sudo apt-get install build-essential cmake pkg-config
sudo apt-get install libjpeg-dev libtiff5-dev libjasper-dev libpng12-dev
sudo apt-get install libavcodec-dev libavformat-dev libswscale-dev libv4l-dev
sudo apt-get install libxvidcore-dev libx264-dev
sudo apt-get install libgtk2.0-dev libgtk-3-dev
sudo apt-get install libatlas-base-dev gfortran
sudo apt-get install  python3-dev
```
我们已经使用在上面安装好了cmake，所以我们使用cmake进行编译,编译参数如下：
```shell
cmake -D CMAKE_BUILD_TYPE=RELEASE \
    -D CMAKE_INSTALL_PREFIX=/usr/local \
    -D INSTALL_PYTHON_EXAMPLES=ON \
    -D OPENCV_EXTRA_MODULES_PATH=~/opencv_contrib-3.3.0/modules \
    -D BUILD_EXAMPLES=ON ..
```

当编译完成以后检查OpenCV是否编译成功，由于树莓派的RAM太小，极有可能编译失败，我们的编译大概花费了5个小时左右

```shell
source ~/.profile #更新以下配置文件
workon cv         # 进入cv虚拟环境中

python            # 进入python的解释器当中查看，我们安装的是Python3

import cv2       #使用cv2这个包
```

返回的结果是

```shell

```

我们的编译结果是成功的。

### 摄像头的安装

我们直接选择树莓派自带的摄像头模块`PiCam`，我们首先需要打开排线的接口

```shell
sudo raspi-config

然后让PiCam的状态改变成Enable
```

接下来我我们需要，安装在硬件方面安装摄像头

如图所示，我们需要将排线带有蓝色端口的一面朝向网线接口

安装好以后我们需要调试以下摄像头

代码具体实现解释，请看Python部分，这里只说以下硬件的简单调试
```shell
python cametest.py
```

我们会发现有两个弹窗，一个是彩色的，另外一个是灰色的弹窗

这就说明我们的调试是成功的


至此，树莓派的基础环境已经准备好了


## Python 部分















## Php云端部分

> php部分在各种方面来说并不完善，由于材料和时间有限，不能顾及所有的方面，但是我们将要开发的功能已经写入了TODO中，可以参照源代码进行查看

### 1.架构模式MVC

我们使用了最经典的网络架构模式——MVC，底层所有的代码都是我们自己写出来的，并没有使用任何第三方的框架,我们可以很方便的按照自己的需求进行代码的维护和升级。这里简单的介绍一下MVC架构

 M：Model，即模型层，是用来进行数据处理的个大类，所有的数据库链接，内容的获取，以及数据库内容的增删改查，全部是使用Model完成的，Model层可以提供数据，也可以修改数据。

 V：View，即视图层，简单的会说就是用所看到的html网页，这写网页都是经过视图层的渲染生成的，视图层负责输出网页给用户看。

 C：Controller，即控制器，控制器是MVC的核心，控制器大部分的任务是分配任务，是MVC中最重要的部分，作为控制器，它会命令模型层获取数据，然后将获取来的数据交给视图层进行处理

#### 自动加载类

具体实现请看UML图

具体代码参考`framework\core\Framework.class.php`
[![自动加载机制.png](https://i.loli.net/2018/04/07/5ac899a7b0823.png)](https://i.loli.net/2018/04/07/5ac899a7b0823.png)



### Api 接口


以自动加载类为基础，Api接口是云端控制台的重中之重，是进行数据交互的关键。

其UML图如下
![API数据交互.png](https://i.loli.net/2018/04/08/5aca37e6165d8.png)


其中提到的未认证的用户Json的标准格式为
```Json
{
	"user_id": 0,
	"user_pic": "https:\/\/xxxxxxxx",
	"user_name": "Unknow",
	"time": 1523202206,
	"token": "b47cc11f9e01d216bf35154f57d63655f830f69d23b8224b512a0dc2f5aec974b47cc11f9e01d216bf35154f57d63655",
	"status": "0"
}
```

认证用户的json的格式为
```Json
{
	"user_id": 4,
	"user_pic": "https:\/\/xxxxxxxx",
	"user_name": "XiaoMing",
	"time": 1523202212,
	"token": "b47cc11f9e01d216bf35154f57d63655f830f69d23b8224b512a0dc2f5aec974b47cc11f9e01d216bf35154f57d63655",
	"status": "1"
}
```
其中
1. ```user_id```是在树莓派中所录入的user_id，如果识别结果为```Unknow```的话我们将user_id设置为0，表示不存在这
个用户。
2. ```user_pic```是上传到图床上面的图片，或者我们会选择直
接将图片post到我们的服务器上面，获取在服务器上面的链接地址。
3. ```user_name```此出为用户的称谓，我们需要用这个来判断用户是否已经在服务器端进行来注册，如果进行了注册的
我们可以直接在数据库插入此用户的扫描的信息，如果没有注册，我们会将这个用户信息写入```face_user_register```表中，然后进行用户扫描数据的插入。
4. ```time```time为Unix时间戳
5. ```token```token是数据交互所必须具备的，在服务器端php脚本将验证token，如果token正确，才会
进行数据的处理操作，其中数据的token生成和验证，请参见framework/tools/Encrypt.class.php
6. ```status```为认证是否通过的标示，0为没有通过，1通过
目录结构

```
Rasberrypi-FaceRecognition-Web
├── README.md           #说明文档
├── application         #项目目录
│   ├── admin           #管理员后台目录
│   │   ├── controller  #控制器目录
│   │   │   ├── AdminController.class.php       #管理员身份控制器（负责修改信息）
│   │   │   ├── ApiController.class.php         #Api上传接口，负责数据交互
│   │   │   ├── IllegalScanController.class.php  #非法扫描用户控制器
│   │   │   ├── IndexController.class.php       # 首页控制器
│   │   │   ├── ScanController.class.php        #扫描总数控制器
│   │   │   └── UserController.class.php        #注册用户控制器
│   │   ├── model                               #模型类目录
│   │   │   ├── RegisterUserModel.class.php     #查询注册用户信息
│   │   │   ├── ScanModel.class.php             #查询所有扫描用户信息
│   │   │   └── UserModel.class.php             #管理员信息
│   │   ├── runtime                             #smarty编译文件
│   │   └── view                                #视图层Html文件
│   │       ├── admin  
│   │       │   └── setting.html
│   │       ├── home
│   │       │   └── home.html
│   │       ├── illegal
│   │       │   ├── illegal.html
│   │       │   └── illegal_detail.html
│   │       ├── layout.html
│   │       ├── msg.html
│   │       └── user
│   │           ├── register_user.html
│   │           └── user_detail.html
│   ├── common                                #公共目录（TODO）占位
│   │   ├── email
│   │   │   └── email_active.php
│   │   └── msg.html
│   ├── home                                  #前台目录
│   │   ├── controller                        #控制器
│   │   │   ├── IndexController.class.php     #首页控制器
│   │   │   └── UserController.class.php      #用户控制器（管理员）
│   │   ├── model                             #模型目录
│   │   │   └── UserModel.class.php           #用户模型（管理员）
│   │   ├── runtime                           #Smarty编译文件
│   │   └── view                              #view层Html文件
│   │       ├── admin
│   │       │   └── all_users.html
│   │       ├── email
│   │       │   └── email.html
│   │       ├── index.html
│   │       ├── layout.html
│   │       ├── msg.html
│   │       ├── test.html
│   │       └── user
│   │           ├── active_success.html
│   │           ├── login.html
│   │           └── rest_password.html
│   └── public                              #前端静态文件
│       ├── css  
│       │   ├── materialize.css
│       │   ├── materialize.min.css
│       │   └── style.css
│       ├── fonts
│       │   ├── FiraCode-Light.ttf
│       │   ├── FiraCode-Regular.ttf
│       │   └── roboto
│       ├── js
│       │   ├── init.js
│       │   ├── materialize.js
│       │   └── materialize.min.js
│       ├── static
│       │   ├── css
│       │   │   ├── admin
│       │   │   │   └── summernote.css
│       │   │   ├── angular-filemanager.min.css
│       │   │   ├── animate.css
│       │   │   ├── bootstrap.min.css
│       │   │   ├── bootstrap4
│       │   │   │   └── bootstrap.min.css
│       │   │   ├── datatables
│       │   │   │   └── dataTables.bootstrap4.css
│       │   │   ├── default-skin
│       │   │   │   ├── default-skin.css
│       │   │   │   ├── default-skin.png
│       │   │   │   ├── default-skin.svg
│       │   │   │   └── preloader.gif
│       │   │   ├── error.css
│       │   │   ├── font
│       │   │   │   ├── summernote.eot
│       │   │   │   ├── summernote.ttf
│       │   │   │   └── summernote.woff
│       │   │   ├── font-awesome.min.css
│       │   │   ├── images
│       │   │   │   ├── arrow.svg
│       │   │   │   ├── close.svg
│       │   │   │   └── spinner.svg
│       │   │   ├── lock.css
│       │   │   ├── login.css
│       │   │   ├── main.css
│       │   │   ├── material.css
│       │   │   ├── mdeditor
│       │   │   │   └── codemirror.css
│       │   │   ├── photoswipe.css
│       │   │   ├── profile.css
│       │   │   ├── setting.css
│       │   │   └── toastr.min.css
│       │   ├── fonts
│       │   │   ├── FontAwesome.otf
│       │   │   ├── fontawesome-webfont.eot
│       │   │   ├── fontawesome-webfont.svg
│       │   │   ├── fontawesome-webfont.ttf
│       │   │   ├── fontawesome-webfont.woff
│       │   │   ├── fontawesome-webfont.woff2
│       │   │   ├── glyphicons-halflings-regular.eot
│       │   │   ├── glyphicons-halflings-regular.svg
│       │   │   ├── glyphicons-halflings-regular.ttf
│       │   │   ├── glyphicons-halflings-regular.woff
│       │   │   └── glyphicons-halflings-regular.woff2
│       │   ├── img
│       │   │   ├── alipay.png
│       │   │   ├── card.png
│       │   │   ├── default.png
│       │   │   ├── local.png
│       │   │   ├── logo_s.png
│       │   │   ├── logo_white.png
│       │   │   ├── oss.png
│       │   │   ├── output.jpg
│       │   │   ├── profile.jpg
│       │   │   ├── qiniu.png
│       │   │   ├── remote.png
│       │   │   ├── s3.png
│       │   │   ├── sign.png
│       │   │   ├── upyun.png
│       │   │   └── weixin-icon.png
│       │   └── js
│       │       ├── angular-filemanager.min.js
│       │       ├── angular-translate.min.js
│       │       ├── angular.min.js
│       │       ├── bootstrap.min.js
│       │       ├── bootstrap4
│       │       │   └── bootstrap.bundle.min.js
│       │       ├── jquery.color.js
│       │       ├── jquery.liMarquee.js
│       │       ├── jquery.min.js
│       │       ├── jquery.poptrox.min.js
│       │       ├── login.js
│       │       ├── material.js
│       │       ├── profile.js
│       │       └── setting.js
│       └── uploads
├── framework                               #本人开发的一个MVC轻量级框架，按照GPLv3开
│   ├── config                              #网站的所有配置选项
│   │   └── config.php
│   ├── core                                #所有基础类
│   │   ├── Controller.class.php            #控制器基础类
│   │   ├── Factory.class.php               #工厂类
│   │   ├── Framework.class.php             #框架核心类（自动加载，分发器）
│   │   └── Model.class.php                 #基础模型类
│   ├── dao                                 #数据库链接DAO工具
│   │   ├── DAOPDO.class.php                #数据库PDO类
│   │   └── I_DAO.interface.php             #数据库PDO接口
│   ├── tools                               #工具类目录
│   │   ├── Captcha.class.php               #验证码类
│   │   ├── CheckPath.class.php             #路径检测类（用于Debug）
│   │   ├── Email.class.php                 #邮件类
│   │   ├── EmailTemples.class.php          #邮件模版类（TODO：此类将会删除，用smarty拼接）
│   │   ├── Encrypt.class.php               #加密类，在生成json中token验证
│   │   ├── HttpRequest.class.php           #http请求类，主要封装了Curl
│   │   ├── Page.class.php                  #分页类
│   │   ├── Regex.class.php                 #正则类
│   │   ├── Thumb.class.php                 #图像压缩类
│   │   └── Upload.class.php                #上传类
│   └── vendor                              #第三方库（别人的轮子）
│       ├── PHPMailer                       #使用php发送邮件
│       └── smarty                          #模版引擎渲染
|
└── index.php                               #入口文件
