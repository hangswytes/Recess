import java.net.Socket;

public class G22Client {
    public static void main(String[] args) {
        
        try {
            
            System.out.println("Client started");
            Socket soc = new Socket("localhost", 7777);
        }
         catch (Exception e) {
            e.printStackTrace();
        }
    }
}
