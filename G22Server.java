import java.net.ServerSocket;
import java.net.Socket;

public class G22Server {
    public static void main(String[] args) {
        
        try {
            System.out.println("Waiting for client...");
            ServerSocket ss = new ServerSocket(7777);
            Socket soc = ss.accept();
            System.out.println("Connection established");
        } 
        catch (Exception e) {
            e.printStackTrace();
        }
    }
}
