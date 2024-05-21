import java.io.IOException;
import java.io.PrintWriter;
import java.net.URLEncoder;
import jakarta.servlet.ServletException;
import jakarta.servlet.http.Cookie;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

public class CheckboxServlet extends HttpServlet {
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        PrintWriter out = response.getWriter();        
        String[] items = request.getParameterValues("movie");
        if (items != null) {
            String joinItems = String.join(",", items);
            String encoded = URLEncoder.encode(joinItems, "UTF-8");
            Cookie ck = new Cookie("SMovies", encoded);
            response.addCookie(ck);
        }
        
        String url = "http://localhost:8089/SemLab/cookiesStored";
        response.sendRedirect(url);
    }
}
