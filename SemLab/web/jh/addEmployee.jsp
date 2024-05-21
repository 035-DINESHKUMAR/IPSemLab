<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@page import="java.sql.Connection" %>
<%@page import="java.sql.DriverManager" %>
<%@page import="java.sql.PreparedStatement" %>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Add Employee</title>
    </head>
    <body>
        <%
            String id = request.getParameter("id");
            String name = request.getParameter("name");
            String dept = request.getParameter("dept");
            String salary = request.getParameter("sal");
            String position = request.getParameter("pos");
            String localhost = "jdbc:mysql://localhost:3306/vishnu";
            String userName = "root";
            String pass = "Dinesh@2024";
            String query = "INSERT INTO employee (name, dept, salary, position, id) VALUES (?, ?, ?, ?)";
            Connection con = null;
            PreparedStatement ps = null;
            try{
                Class.forName("com.mysql.cj.jdbc.Driver");
                con = DriverManager.getConnection(localhost, userName, pass);
                ps = con.prepareStatement(query);
                ps.setString(1, name);
                ps.setString(2, dept);
                ps.setInt(3, Integer.parseInt(salary));
                ps.setString(4, position);
                ps.setInt(5, Integer.parseInt(id));
                int rows = ps.executeUpdate();
                if(rows > 0){
                    out.println("Inserted Successfully!");
                }else{
                    out.println("Error occured during insertion");
                }
            }catch (Exception e){
                out.println("Error Message : " + e.getMessage());
            }
        %>
    </body>
</html>
