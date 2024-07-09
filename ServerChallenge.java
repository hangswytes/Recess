import java.io.*;
import java.net.*;
import java.sql.*;

import java.util.*;
import javax.mail.*;
import javax.mail.PasswordAuthentication;
import javax.mail.internet.InternetAddress;
import javax.mail.internet.MimeMessage;
public class ServerChallenge {
    public static void main(String[] args) throws ClassNotFoundException, SQLException {
       try{
        ServerSocket ss=new ServerSocket(5112);
        System.out.println("\tMathematics Challenge System. waiting for the client.....");
        Class.forName("com.mysql.cj.jdbc.Driver");

        //establishing database connection with the server
        Connection con=DriverManager.getConnection("jdbc:mysql://localhost:3306/mathematicschallenge","root","");
        System.out.println("Server has connected to the database.");
        //Socket soc=new Socket();
        


        while(true){
             Socket soc=ss.accept();
            System.out.println(" Client has connected at " +soc);
            //ClientHandler t = new ClientHandler(soc, con);
            BufferedReader B=new BufferedReader(new InputStreamReader(soc.getInputStream()));
            PrintWriter out=new PrintWriter(soc.getOutputStream());
                //t.start();
            //reading from the client
            String command=B.readLine();
            System.out.println(" the client says >>> :\n"+command);
        
        
            //handling command processing
            if(command.startsWith("register")){
                String reg=command.substring(9);
                boolean answer=registerParticipant(con,reg);
                if (answer) {
                    out.println("Registration successful. A confirmation email has been sent to the representative.");
                } else {
                    out.println("Registration failed. School registration number not found.");
                }
                
            }else if(command.equals("viewChallenges")){
                List<Map<String, Object>> challenges = retrieveChallengesFromDatabase(con);
                ObjectOutputStream objectOutputStream = new ObjectOutputStream(soc.getOutputStream());
                objectOutputStream.writeObject(challenges);
                objectOutputStream.flush();

            }else if(command.startsWith("attempt challenge")){
                String attempt = command.substring(17);
                attemptChallenge(con, attempt);
                out.println("challenge attempt recorded");

            }else if (command.equals("view applicants")){
                List<Map<String, Object>> applicants = retrieveApplicantsFromDatabase(con);
                //object output stream declared at the point of use
                ObjectOutputStream objectOutputStream = new ObjectOutputStream(soc.getOutputStream());
                objectOutputStream.writeObject(applicants);
                objectOutputStream.flush(); 

            }else if (command.startsWith("confirm")){
                String[] partsOfCommand = command.split(" ");
                String action = partsOfCommand[1];
                String username = partsOfCommand[2];
                if (action.equals("yes")) {
                confirmApplicant(con, username, true);
                out.println("Applicant confirmed.");
                } else if (action.equals("no")) {
                confirmApplicant(con, username, false);
                out.println("Applicant rejected.");
                } else {
                out.println("Invalid command.");
                } 
            }
        
        
       }}catch(IOException e){
        e.printStackTrace();
       }
    }
   
//method implementation
    //handling registration
    private static boolean registerParticipant(Connection con, String reg) throws SQLException {
    String [] info=reg.split(" ");
    if (info.length < 7) {
    System.out.println("Incomplete registration information.");
    }
    String dateOfBirth = info[4].trim();
    // validate date format yyyy-mm-dd 
    if (!dateOfBirth.matches("\\d{4}/\\d{2}/\\d{2}")) {
    System.out.println("Invalid date format.");
    }
    //replace a hash with a hyphen
    dateOfBirth = dateOfBirth.replace('/', '-'); // Converting to SQL date format
    String checkQuery = "SELECT * FROM schools WHERE school_registration_number = ?";
    PreparedStatement checkSt = con.prepareStatement(checkQuery);
    checkSt.setString(1, info[5].trim());
    ResultSet rs = checkSt.executeQuery();

    if (!rs.next()) {
    return false; // School registration number not found
    }
    //start registration
    String query="INSERT INTO applicants(username,firstname,lastname,email,date_of_birth,school_registration_number,imagefile) VALUES(?,?,?,?,?,?,?)";
    PreparedStatement St=con.prepareStatement(query);
    St.setString(1, info[0].trim());
    St.setString(2, info[1].trim());
    St.setString(3, info[2].trim());
    St.setString(4, info[3].trim());
    St.setString(5, dateOfBirth);
    St.setString(6, info[5].trim());
    St.setString(7, info[6].trim());
    St.executeUpdate();
    St.close();
    //adding participants whose schools exist in the database;
    try (FileWriter writer = new FileWriter("registered_participants.txt", true)) {
            writer.write(reg + "\n");
        } catch (IOException e) {
            e.printStackTrace();
    }
    // Send confirmation email to representative
    sendConfirmationEmail(info[0].trim(), false);

    return true;
    }

    //handling the view challenges command
    private static List<Map<String, Object>> retrieveChallengesFromDatabase(Connection con) throws SQLException {
            List<Map<String, Object>> challenges = new ArrayList<>();
            Statement statement = con.createStatement();
            ResultSet resultSet = statement.executeQuery("SELECT * FROM challenges WHERE end_date > NOW()");
    
            while (resultSet.next()) {
                Map<String, Object> challenge = new HashMap<>();
                challenge.put("id", resultSet.getInt("id"));
                challenge.put("challengeNo", resultSet.getString("challengeNo"));
                challenge.put("start_date", resultSet.getString("start_date"));
                challenge.put("end_date", resultSet.getString("end_date"));
                challenge.put("duration", resultSet.getString("duration"));
    
                challenges.add(challenge);
            }
    
            resultSet.close();
            statement.close();
            con.close();
    
            return challenges;
        }

        //handling the attempt challenges command
        private static void attemptChallenge(Connection con, String attempt) throws SQLException {
            String[] info = attempt.split(" ");
        if (info.length < 2) {
            throw new IllegalArgumentException("Incomplete challenge attempt information.");
        }
        //insert attempt into the database
        String query = "INSERT INTO attempts(participant_username, challenge_id, attempt_date) VALUES(?, ?, NOW())";
        PreparedStatement St = con.prepareStatement(query);
        St.setString(1, info[0].trim());
        St.setInt(2, Integer.parseInt(info[1].trim()));
        St.executeUpdate();
        St.close();
        }

        //handling the view applicants command
        private static List<Map<String, Object>> retrieveApplicantsFromDatabase(Connection con) throws SQLException {
            List<Map<String, Object>> applicants = new ArrayList<>();
            Statement statement = con.createStatement();
            ResultSet resultSet = statement.executeQuery("SELECT * FROM applicants");

            while (resultSet.next()) {
            //constructor
            Map<String, Object> applicant = new HashMap<>();//each column represented as a hash map
            applicant.put("username", resultSet.getString("username"));
            applicant.put("firstname", resultSet.getString("firstname"));
            applicant.put("lastname", resultSet.getString("lastname"));
            applicant.put("email", resultSet.getString("email"));
            applicant.put("date_of_birth", resultSet.getString("date_of_birth"));
            applicant.put("school_registration_number", resultSet.getString("school_registration_number"));
            applicant.put("imagefile", resultSet.getString("imagefile"));
            //adding an applicant to the list
            applicants.add(applicant);
        }

        resultSet.close();
        statement.close();

        return applicants;
        }

        //confirming the applicants(that is confirm yes/no command)
        private static void confirmApplicant(Connection con, String username, boolean b) throws SQLException {
            String query;
        if (b) {
            query = "INSERT INTO participants SELECT * FROM applicants WHERE username = ?";
        } else {
            query = "INSERT INTO rejected SELECT * FROM applicants WHERE username = ?";
        }
        PreparedStatement ps = con.prepareStatement(query);
        ps.setString(1, username);
        ps.executeUpdate();
        ps.close();

        if (b) {
            query = "DELETE FROM applicants WHERE username = ?";
        } else {
            query = "DELETE FROM applicants WHERE username = ?";
        }
        ps = con.prepareStatement(query);
        ps.setString(1, username);
        ps.executeUpdate();
        ps.close();
        
        sendConfirmationEmail(username, b); 
        }

        //sending an email in both cases
        private static void sendConfirmationEmail(String username, boolean b) {
            String host = "smtp.example.com";
            final String email = "your-email@example.com";
            final String password = "your-password";

        Properties props = new Properties();
        props.put("mail.smtp.auth", "true");
        props.put("mail.smtp.starttls.enable", "true");
        props.put("mail.smtp.host", host);
        props.put("mail.smtp.port", "587");

        Session session = Session.getInstance(props, new javax.mail.Authenticator() {
            protected PasswordAuthentication getPasswordAuthentication() {
                return new PasswordAuthentication(email, password);
            }
        });

        try {
            Message message = new MimeMessage(session);
            message.setFrom(new InternetAddress(email));
            // Fetch the representative's email from the database
            String representativeEmail = getRepresentativeEmail(username);
            message.setRecipients(Message.RecipientType.TO, InternetAddress.parse(representativeEmail));
            if (b) {
                message.setSubject("Participant Confirmation");
                message.setText("The participant with username: " + username + " has been confirmed.");
            } else {
                message.setSubject("Participant Rejection");
                message.setText("The participant with username: " + username + " has been rejected.");
            }

            Transport.send(message);
        } catch (MessagingException | SQLException e) {
            throw new RuntimeException(e);
        
            }
        }

        //getting representative email from the schools table in the database
        private static String getRepresentativeEmail(String username) throws SQLException {
            Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/mathematicschallenge", "root", "");
            String query = "SELECT EMAILOFTHEREPRESENTATIVE FROM schools WHERE schoolregistrationumber = (SELECT school_registration_number FROM applicants WHERE username = ?)";
            PreparedStatement ps = con.prepareStatement(query);
            ps.setString(1, username);
            ResultSet rs = ps.executeQuery();
            String email = null;
            if (rs.next()) {
                email = rs.getString("EMAILOFTHEREPRESENTATIVE");
            }
            rs.close();
            ps.close();
            con.close();
            return email;
        }
        }
    
        
    
    

