<%-- 
    Document   : locationfinder
    Created on : Mar 11, 2014, 10:40:56 PM
    Author     : gilbertodemelo
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <jsp:useBean id="mybean" scope="session" class="genericgame1067.Location" />
        <jsp:setProperty name="mybean" property="name" />
        <%@page import="geocode.js" %>
                
                
    </body>
</html>
