<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@page import="java.sql.Connection" %>
<%@page import="java.sql.DriverManager" %>
<%@page import="java.sql.PreparedStatement" %>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Edited Salary</title>
    </head>
    <body>
        <%
            String salary = request.getParameter("sal");
            String localhost = "jdbc:mysql://localhost:3306/mysql";
            String userName = "root";
            String pass = "Dinesh@2024";
            String query = "UPDATE vishnu.employee SET salary = ? WHERE id = ?";
            Connection con = null;
            PreparedStatement ps = null;
            try{
                Class.forName("com.mysql.cj.jdbc.Driver");
                con = DriverManager.getConnection(localhost, userName, pass);
                ps = con.prepareStatement(query);
                ps.setInt(1, Integer.parseInt(salary));
                ps.setInt(2, Integer.parseInt(id));
                int rows = ps.executeUpdate();
                if(rows > 0){
                    out.println("Your Salary is edited Successfully!");
                }else{
                    out.println("Error occured during editing");
                }
            }catch (Exception e){
                out.println("Error Message : " + e.getMessage());
            }finally{
                ps.close();
                con.close();
            }
        %>
    </body>
</html>
