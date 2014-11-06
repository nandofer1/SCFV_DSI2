/*
 * Layout
 */

body{
	position:fixed; 
	top:0px; 
	left:0px;
	bottom:0px; 
	right:0px;  
	margin:0px;
	font-family: sans;
}

#container{
	display:table; 
	width: 100%; 
	height: 100%;
}

#header-row{
	display:table-row; 
	height: 45px;	
	background: #313131;
	border-bottom: 1px solid black;
}

#header {
	display: table-cell;
	padding: 5px;
	padding-top: 7px;
}

	#header img{
		display:inline;
		vertical-align: middle;
		width: 40px;
		height: 40px;
		margin-left: 5px;	
	}

	#header h1{
		display:inline;
		font-size: medium;
		vertical-align: middle;
		margin-left: 5px;
		color: lightgray; 
		font-size: 19px
	}

	#header span.user-info{
		color: white;
		margin-right: 0px;
		margin-top: 0px;
		float: right;
		vertical-align: middle;
	}


#menu-content-row{
	display: table;
	height: 100%;
}
	
#content {
	display: table-cell;
	border: 1px solid black;
	width: 100%;
	height: 100%;
	padding:0;
	margin:0;
	background: url('../img/lightgray-noise.png');
	position: relative;
}

#menu{
	display: table-cell;
	min-width: 260px;
	height: 100%;	
	padding-top: 0px;
	border-top: 1px solid black;
	background: url('../img/gray-noise.png') #414141;
	position: relative;
}

	#menu a{
		color: lightgray;
		font-weight: bold;
		font-size: 15px;
		text-decoration: none;	
		display: block;		
		letter-spacing: 0.1px;
	}

	#menu ul{
		position: relative;
	}

	ul#first-level img{
		width:30px;
		height:25px;
		margin-right: 4px;
		vertical-align: middle;
	}	

ul#first-level{
	list-style: none;
	margin:0;
	padding:0;
	position: absolute;
	top:0;	
	right:0;
	left: 0;
	z-index: 99;
}

	ul#first-level>li{
		position: relative;
		padding-top: 8px;
		padding-bottom: 8px;
		padding-left: 8px;
	}

	ul#first-level>li:hover{
		background:#FF8000;
		color: #ddd;
	}

ul#second-level{
	display:none;
	list-style: none;
	width: 260px;
	padding:0px;
	color: white;
	background: #444;
	position: absolute;
	top: 0px;
	left: 258px;
	border-radius: 0px 5px 5px 0px; 
	-moz-border-radius: 0px 5px 5px 0px; 
	-webkit-border-radius: 0px 5px 5px 0px; 
	border: 1px solid #333333;
}
	/*ul#first-level>li:hover>ul{
		display: block;	
	}*/
	#menu ul>li:hover>ul{
		display: block;
	}

	ul#second-level>li{
		position: relative;
		padding: 4px;
	}

	ul#second-level>li>a>img{
		width:23px;
		height:23px;
		margin-right: 5px;
		vertical-align: bottom;
	}

	ul#second-level>li>a{
		vertical-align: bottom;
		padding-left: 7px;
		color: inherit;
		display: block;
	}

	ul#second-level>li:hover{
		background:orange;
		color: #333;
	}	

/*
 * Content Styles
 */



.error, .message{
	background: white;	
	border: 1px solid red;
	color: black;
	font-weight: bold;
	text-align: center;
	width: 90%;
	margin: auto;
	padding-top: 5px;
	padding-bottom: 5px;
	margin-bottom: 15px;
}

div.form{
	margin: 0;
	/*height: 99%;*/
	overflow: auto;
	position: absolute;
	top: 0px;
	bottom: 0px;
	left: 0px;
	right: 0px;
}

.form fieldset{

	background: white;
	border: 1px solid black;
	color: black;
	text-align: center;
	width: 90%;
	margin: auto;
	padding-top: 5px;
	padding-bottom: 5px;
	margin-bottom: 15px;
}

div.input{
	width: 90%;
	margin: auto;
	text-align: left;
	margin-bottom: 10px;
}

div.input label{
	display: inline-block;
	width: 250px;
	text-align: right;
	padding-right: 3px;

}
.form div.submit{
	padding-left: 250px;
}

.form legend{
	background: white;
	border: 1px solid black;
	border-bottom: 0px;
	text-align: left;
	display: inline-block;
	width: auto;
	font-size: 17px;
	padding: 5px;
}

table.list{
	width: 100%;
	margin: auto;
	background: white;
	border-collapse: collapse;
}
table.list td{
	border: 1px solid lightgray;
	padding: 5px;
}
table.list th{
	padding-left: 4px;
}

table.list a{
	color: #5E62D3;
}

.list-container{
	background: white;
	border-radius: 6px; 
	-moz-border-radius: 6px; 
	-webkit-border-radius: 6px; 
	border: 1px solid gray;
	margin: 0;
	padding: 2px;
	width: 90%;
	margin: auto	
}

div.list-search{
	width: 100%;
	text-align: right;
	padding: 7px;
	padding-bottom: 20px;
}


.error-message{
	padding-left: 250px;
}

a{
	text-decoration: none;
	color: inherit;
}

h1.list-title{
	color: gray;
	font-size: 23px;
	width: 90%;
	margin: auto;
	padding-bottom: 15px;
}

/*
* Login Styles
*/
.login-outer {
    display: table;
    position: absolute;
    height: 100%;
    width: 100%;
    background: #333;
	background: rgba(85,85,85,1);
	background: -moz-radial-gradient(center, ellipse cover, rgba(85,85,85,1) 0%, rgba(34,34,34,1) 100%);
	background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, rgba(85,85,85,1)), color-stop(100%, rgba(34,34,34,1)));
	background: -webkit-radial-gradient(center, ellipse cover, rgba(85,85,85,1) 0%, rgba(34,34,34,1) 100%);
	background: -o-radial-gradient(center, ellipse cover, rgba(85,85,85,1) 0%, rgba(34,34,34,1) 100%);
	background: -ms-radial-gradient(center, ellipse cover, rgba(85,85,85,1) 0%, rgba(34,34,34,1) 100%);
	background: radial-gradient(ellipse at center, rgba(85,85,85,1) 0%, rgba(34,34,34,1) 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#555555', endColorstr='#222222', GradientType=1 );
}

.login-middle {
    display: table-cell;
    vertical-align: middle;
}

.login-inner {
    margin-left: auto;
    margin-right: auto; 
    margin-bottom: 50px;
    width: 50%;/*whatever width you want*/;
    /*border: 1px solid black;*/
}

.login-title{
  text-align: center;
}

.login-title>img{
	width: 85px;
	height: 85px;
	padding: 3px;
	vertical-align: middle;

}

.login-title>span{
	font-size: 20px;
	font-weight: bold;
	color: #BBB;
	vertical-align: middle;
}

.login-inner label{
	color: #dddddd;
}

.login-inner input[type=text], .login-inner input[type=password] 
{
	padding:2px; 
}

#authMessage{
  display: none;
}

input[type=text], input[type=password]  
{
	margin: 0;
	padding:1px; 
	-webkit-border-radius: 4px;
  border-radius: 4px;
  font-weight: bold;
	border:1px solid #ccc; 
}
input[type=text]:focus, input[type=password]:focus {
	border-color:#333; 
}

input[type=submit] {
	padding:5px 15px; 
	background:#ccc; 
	border:0 none;
  cursor:pointer;
  -webkit-border-radius: 5px;
  border-radius: 5px; 
  font-weight: bold;
  color: #333;
}

input[type=submit]:active{
	background: #ddd;
}
//PAGINADOR
.paging {
	background:#fff;
	color: #ccc;
	margin-top: 1em;
	clear:both;
}

.paging .current,
.paging .disabled,
.paging a {
	text-decoration: none;
	padding: 5px 8px;
	display: inline-block
}
.paging > span {
	display: inline-block;
	border: 1px solid #ccc;
	border-left: 0;
}
.paging > span:hover {
	background: #efefef;
}
.paging .prev {
	border-left: 1px solid #ccc;
	-moz-border-radius: 4px 0 0 4px;
	-webkit-border-radius: 4px 0 0 4px;
	border-radius: 4px 0 0 4px;
}
.paging .next {
	-moz-border-radius: 0 4px 4px 0;
	-webkit-border-radius: 0 4px 4px 0;
	border-radius: 0 4px 4px 0;
}
.paging .disabled {
	color: #ddd;
}
.paging .disabled:hover {
	background: transparent;
}
.paging .current {
	background: #efefef;
	color: #c73e14;
}


span.glyphicon{
	float: right; 
	padding-top: 6px; 
	font-size: x-small
} 
