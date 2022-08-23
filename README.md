<h1> RestApi in php </h1>
<h2>RestApi to send feadback on certain thing</h2>
<ul>
<h1> The first endpoint: • http://registesys.atwebpages.com/signup </h1>
<h2>to signup a new user</h2>
<h3>the data you should send to it is a type of JSON object</h3>
<li> • Ex. {
"email":"mmoh33657@gmail.com",
"password":"mohamedreda",
"userName":"Mohamed Reda",
"phone":"01212745939",
 } </li>
 <li> • Response Example: { "Response": { "success": 1, "message": "success", "Token": "s:28:\"bW1vaDMzNjU4QGdtYWlsLmNvbQ==\";“
 },"data": {"uname": "Mohamed Reda“, "phone": "01212745939“ }} </li>

<h1> The Second endpoint: http://registesys.atwebpages.com/login </h1>
to login
the data you should send to it is a type of JSON object
<li> • Ex. {
"email":"mmoh33657@gmail.com",
"password":"mohamedreda",
} </li>
<li> • Response Example: { "Response": { "success": 1, "message": "success",
"Token": "s:28:\"bW1vaDMzNjU4QGdtYWlsLmNvbQ==\";“ },"data": {"uname": "Mohamed Reda“,
"phone": "01212745939“ }} </li>
The Third endpoint
<h1> • http://registesys.atwebpages.com/logout </h1>
to logout
<li> • Response Example: { "Response": { "success": 1, "message": "success " }} </li>

<h1> The Fourth endpoint: http://registesys.atwebpages.com/sendfeadbacks </h1>
to send a feadback
the data you should send to it is a type of JSON object
<li> • Ex. {
"email":"mmoh33657@gmail.com",
"message":"This is a task 321",
"sessionId":2
} </li>
<li> • Response Example: { "Response": { "success": 1, "message": "success}} </li>
The Fifth endpoint
<h1> • http://registesys.atwebpages.com/getfeadbacks </h1>
to get feadbacks
<li> • Response Example: { "Response": { "success": 1, "message": "success},
“data"::[{"id":"10","email":"mmoh33650@gmail.com","mess":"This is a task
?","sessionId":"1","session_title":"ui\\ux"},{"id":"11","email":"mmoh33650@gmail.com","mess":"This is a
task ?","sessionId":"1","session_title":"ui\\ux"}} </li>
The sixth endpoint
<h1> • http://registesys.atwebpages.com/getsessions </h1>
to get sessions
<li> • Response Example: { "Response": { "success": 1,
"message": "success}, "data": [{"sessionId": "1", "session_title": "ui\\ux"}] </li>

<h1> The seventh endpoint:  http://registesys.atwebpages.com/getusers </h1>
to get users
<li> • Response Example: { "Response": { "success": 1, "message": "success}, "data": [
{
"email": "mmoh33650@gmail.com",
"uname": "Mohamed Reda",
"phone": "01212745939"
}] </li>
 </ul>
The End 🙃
