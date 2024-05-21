<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@page import="java.sql.Connection" %>
<%@page import="java.sql.DriverManager" %>
<%@page import="java.sql.ResultSet" %>
<%@page import="java.sql.Statement" %>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Number of Employees</title>
    </head>
    <body>
        <%
            String localhost = "jdbc:mysql://localhost:3306/mysql";
            String userName = "root";
            String pass = "Dinesh@2024";
            String query = "SELECT COUNT(*) AS NEM FROM vishnu.employee";
            Connection con = null;
            Statement st = null;
            ResultSet rs = null;
            try{
                Class.forName("com.mysql.cj.jdbc.Driver");
                con = DriverManager.getConnection(localhost, userName, pass);
                st = con.createStatement();
                rs = st.executeQuery(query);
                if(rs.next()){
                    int cnt = rs.getInt("NEM");
                    out.println("<html>");
                    out.println("<body>");
                    out.println("<h1> The Number of Employees is" + cnt + "</h1>");
                    out.println("</body>");
                    out.println("</html>");
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
