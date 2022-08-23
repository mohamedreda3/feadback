RestApi in php
RestApi to send feadback on certain thing
The first endpoint
• http://registesys.atwebpages.com/signup
to signup a new user
the data you should send to it is a type of JSON object
• Ex. {
"email":"mmoh33657@gmail.com",
"password":"mohamedreda",
"userName":"Mohamed Reda",
"phone":"01212745939",
}
• Response Example: { "Response": { "success": 1, "message": "success", "Token": "s:28:\"bW1vaDMzNjU4QGdtYWlsLmNvbQ==\";“
},"data": {"uname": "Mohamed Reda“, "phone": "01212745939“ }}
The Second endpoint
• http://registesys.atwebpages.com/login
to login
the data you should send to it is a type of JSON object
• Ex. {
"email":"mmoh33657@gmail.com",
"password":"mohamedreda",
}
• Response Example: { "Response": { "success": 1, "message": "success",
"Token": "s:28:\"bW1vaDMzNjU4QGdtYWlsLmNvbQ==\";“ },"data": {"uname": "Mohamed Reda“,
"phone": "01212745939“ }}
The Third endpoint
• http://registesys.atwebpages.com/logout
to logout
• Response Example: { "Response": { "success": 1, "message": "success " }}
The Fourth endpoint
• http://registesys.atwebpages.com/sendfeadbacks
to send a feadback
the data you should send to it is a type of JSON object
• Ex. {
"email":"mmoh33657@gmail.com",
"message":"This is a task 321",
"sessionId":2
}
• Response Example: { "Response": { "success": 1, "message": "success}}
The Fifth endpoint
• http://registesys.atwebpages.com/getfeadbacks
to get feadbacks
• Response Example: { "Response": { "success": 1, "message": "success},
“data"::[{"id":"10","email":"mmoh33650@gmail.com","mess":"This is a task
?","sessionId":"1","session_title":"ui\\ux"},{"id":"11","email":"mmoh33650@gmail.com","mess":"This is a
task ?","sessionId":"1","session_title":"ui\\ux"}}
The sixth endpoint
• http://registesys.atwebpages.com/getfeadbacks
to get sessions
• Response Example: { "Response": { "success": 1,
"message": "success}, "data": [{"sessionId": "1", "session_title": "ui\\ux"}]
The seventh endpoint
• http://registesys.atwebpages.com/getfeadbacks
to get users
• Response Example: { "Response": { "success": 1, "message": "success}, "data": [
{
"email": "mmoh33650@gmail.com",
"uname": "Mohamed Reda",
"phone": "01212745939"
}]
The End 🙃
