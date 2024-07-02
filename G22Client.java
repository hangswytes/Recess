import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.Socket;
import java.net.UnknownHostException;

public class G22Client {
    public static void main(String[] var0) throws UnknownHostException, IOException {
      try {
         Socket soc= new Socket("localhost", 5112);
         BufferedReader B = new BufferedReader(new InputStreamReader(System.in));
         PrintWriter P = new PrintWriter(soc.getOutputStream(), true);
         BufferedReader Br= new BufferedReader(new InputStreamReader(soc.getInputStream()));
         String num = null;
         System.out.println("enter the number");
         num = B.readLine();//reading from the keyboard
         P.println("the num is"+num);
      } catch (IOException e) {
         e.printStackTrace();
      }


}
}