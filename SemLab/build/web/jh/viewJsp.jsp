<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@page import="java.sql.Connection" %>
<%@page import="java.sql.DriverManager" %>
<%@page import="java.sql.PreparedStatement" %>
<%@page import="java.sql.ResultSet" %>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>View Data</title>
        <style>
            table {
                width: 50%;
                border-collapse: collapse;
            }
            th, td {
                border: 1px solid black;
                padding: 8px;
                text-align: left;
            }
            th {
                background-color: #f2f2f2;
            }
    </style>
    </head>
    <body>
        <%
            String id = request.getParameter("id");
            String localhost = "jdbc:mysql://localhost:3306/mysql";
            String userName = "root";
            String pass = "Dinesh@2024";
            String query = "SELECT name, dept, salary, position FROM vishnu.emlpoyee WHERE id = ?";
            Connection con = null;
            PreparedStatement ps = null;
            try{
                Class.forName("com.mysql.cj.jdbc.Driver");
                con = DriverManager.getConnection(localhost, userName, pass);
                ps = con.prepareStatement(query);
                ps.setInt(1, Integer.parseInt(id));
                ResultSet rs = ps.executeUpdate();
                out.println("<table>");
                out.println("<tr><th>Name</th><th>Department</th><th>Salary</th><th>Position</th></tr>");
                if (rs.next()) {
                    String name = rs.getString("name");
                    String dept = rs.getString("dept");
                    int salary = rs.getInt("salary");
                    String position = rs.getString("position");
                        out.println("<tr>");
                    out.println("<td>" + name + "</td>");
                    out.println("<td>" + dept + "</td>");
                    out.println("<td>" + salary + "</td>");
                    out.println("<td>" + position + "</td>");
                    out.println("</tr>");
                } else {
                    out.println("<tr><td colspan='4'>No employee found with ID: " + id + "</td></tr>");
                }
            }catch (Exception e){
                out.println("Error Message : " + e.getMessage());
            }finally{
                ps.close();
                con.close();
                rs.close();
            }
        %>
    </body>
</html>
