import java.io.IOException;
import java.io.PrintWriter;
import jakarta.servlet.ServletException;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
public class age extends HttpServlet {
    protected void doGet(HttpServletRequest rq, HttpServletResponse rs)
            throws ServletException, IOException {
        rs.setContentType("text/html;charset=UTF-8");
        PrintWriter out = rs.getWriter();
        String dob = rq.getParameter("dob");
        String[] stringNumbers = dob.split("-");
        int yy = 2024 - Integer.parseInt(stringNumbers[0]);
        int mm = (5 - Integer.parseInt(stringNumbers[1])) + 12;
        int dd = (21 - Integer.parseInt(stringNumbers[2])) + 30;
        out.println("<html>");
        out.println("<body>");
        out.println("<h1> The age exactly is " + yy + " years " + mm + " months " + dd + " days " + "</h1>");
        out.println("</body>");
        out.println("</html>");
    }
}
