import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.Socket;

public class Clientchallenge {
    public static void main(String[] args) {
        try{
            Socket soc=new Socket("localhost", 8000);
            BufferedReader B=new BufferedReader(new InputStreamReader(System.in));
            PrintWriter P=new PrintWriter(soc.getOutputStream(),true);
            BufferedReader Br=new BufferedReader(new InputStreamReader(soc.getInputStream()));
            //ObjectInputStream in = new ObjectInputStream(soc.getInputStream());
            while(true){
            System.out.println("\t Welcome to mathematics Challenge System ");
            System.out.println("enter command of your choice from the menu");
            System.out.println("menu\n\n Register  username lastname firstname emailAddress date_of_birth  school_registration_number image _file.png\n\n viewChallenges -displays the challenges \n\n attemptChallenge challenge number \n\n view applicants\n\n confirm yes/no username");
            String choice=B.readLine();
            P.println(choice);//sending to the server
            String message=null;
           // Br.readLine();
            System.out.println(message);
            //view challenges command
        //    @SuppressWarnings("unchecked")
        //    List<Map<String, Object>> challenges = (List<Map<String, Object>>) Br.readLine();
        //    for (Map<String, Object> challenge : challenges) {
        //        System.out.println(challenge);
        //     }
            //String validChallenge= Br.readLine();
            //System.out.println(validChallenge);
            //String challengeNumber=B.readLine();
            //P.println(challengeNumber);
    
            }}catch(IOException e){
            e.printStackTrace();
        }
    
    }} 

