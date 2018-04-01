# Rasberrypi-FaceRecognition-Web

















## 中文说明

## php部分


### 数据交互

使用json进行数据的交互，默认的格式如下：
```JSON
{
	"user_id": "1",
	"user_pic": "https:\/\/xxxxxxxx",
	"user_name": "XiaoMing",
	"time": 1522575525,
	"token": "lJadmm7Gm8jIa8iYmmZqmcNol5ybYm+Zl2dtmmeXl5o=",
	"status": "1"
}
```
其中
1. ```user_id```是在树莓派中所录入的user_id，如果识别结果为```Unknow```的话我们将user_id设置为0，表示不存在这
个用户。
2. ```user_pic```是上传到图床上面的图片，或者我们会选择直
接将图片post到我们的服务器上面，获取在服务器上面的链接地址。
3. ```user_name```此出为用户的称谓，我们需要用这个来判断用户是否已经在服务器端进行来注册，如果进行了注册的
我们可以直接在数据库插入此用户的扫描的信息，如果没有注册，我们会将这个用户信息写入
```face_user_register```表中，然后进行用户扫描数据的插入。
4. ```time```time为Unix时间戳
5. ```token```token是数据交互所必须具备的，在服务器端php脚本将验证token，如果token正确，才会
进行数据的处理操作，其中数据的token生成和验证，请参见framework/tools/Encrypt.class.php
6. ```status```为认证是否通过的标示，0为没有通过，1通过
