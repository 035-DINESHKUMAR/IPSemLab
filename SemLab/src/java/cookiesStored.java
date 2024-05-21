import java.io.IOException;
import java.io.PrintWriter;
import java.net.URLDecoder;
import jakarta.servlet.ServletException;
import jakarta.servlet.http.Cookie;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

public class cookiesStored extends HttpServlet {
    protected void doGet(HttpServletRequest rq, HttpServletResponse rs)
            throws ServletException, IOException {
        rs.setContentType("text/html;charset=UTF-8");
        PrintWriter out = rs.getWriter();
        Cookie[] cookies = rq.getCookies();
        String selectedMovies = null;
        if (cookies != null) {
            for (Cookie cookie : cookies) {
                if (cookie.getName().equals("SMovies")) {
                    selectedMovies = URLDecoder.decode(cookie.getValue(), "UTF-8");
                    break;
                }
            }
        }
        out.println("<html>");
        out.println("<body>");
        out.println("<h1>Selected Movies</h1>");
        out.println("<p>" + selectedMovies.replace(",", "<br/>") + "</p>");
        out.println("</body>");
        out.println("</html>");
    }
}
