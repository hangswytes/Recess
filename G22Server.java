import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.ServerSocket;
import java.net.Socket;

public class G22Server {
    public static void main(String[] args){
        try{
            ServerSocket ss =new ServerSocket(5112);
        Socket s =ss.accept();
        System.out.println("connected");
        System.out.println("waiting");
        BufferedReader B =new BufferedReader(new InputStreamReader(s.getInputStream()));
        PrintWriter P =new PrintWriter(s.getOutputStream());
        String data=null;
        data=B.readLine();//Reading from socket of the client

        
        System.out.println(data);
       ss.close();
       s.close();
        }catch(IOException e){
            e.printStackTrace();
        }

    }

}
