import java.net.*;
import java.io.*;
import java.sql.*;
import java.util.*;
public class ServerChallenge {
    public static BufferedReader b;
    public static Socket soc;
    public static ServerSocket ss;
    public static void main(String[] args) throws ClassNotFoundException,SQLException,Exception{
           try{
            ServerSocket ss=new ServerSocket(5112);
        System.out.println("\tMathematics Challenge System. waiting for the client.....");  
       //establish database connection
        Class.forName("com.mysql.cj.jdbc.Driver");
        Connection con=DriverManager.getConnection("jdbc:mysql://localhost:3306/mathematicschallenge","root","");
        System.out.println("database has connected");
        
        while(true){
        Socket soc=ss.accept();
        System.out.println(" Client has connected at " +soc);
        BufferedReader B=new BufferedReader(new InputStreamReader(soc.getInputStream()));
        PrintWriter out=new PrintWriter(soc.getOutputStream());
       // FileWriter write=new FileWriter("");
        //reading client command
        String command=B.readLine();
        System.out.println(" the client says :"+command);
        //handle participant registration
        if(command.startsWith("register")){
            String reg=command.substring(9);
            registerParticipant(con,reg);
            out.println("registration successful");
            //handling viewing challenges
        }else
        if(command.equals("viewChallenges")){
        List<Map<String, Object>> challenges = retrieveChallengesFromDatabase(con);
        ObjectOutputStream objectOutputStream = new ObjectOutputStream(soc.getOutputStream());
        objectOutputStream.writeObject(challenges);
        objectOutputStream.flush();
      //handle attempting challenges command
        }else
         if(command.startsWith("attempt challenge")){
            String attempt = command.substring(17);
            attemptChallenge(con, attempt);
            out.println("challenge attempt recorded");

         }//handle the view applicants command
         else if (command.equals("view applicants")) {
            List<Map<String, Object>> applicants = retrieveApplicantsFromDatabase(con);
            ObjectOutputStream objectOutputStream = new ObjectOutputStream(soc.getOutputStream());
            objectOutputStream.writeObject(applicants);
            objectOutputStream.flush();
         }
         soc.close();
    }}catch(IOException | SQLException | ClassNotFoundException e){
        e.printStackTrace();}
    }
//attempt challenge method
    private static void attemptChallenge(Connection con, String attempt) throws SQLException {
        String[] info = attempt.split(" ");
        if (info.length < 2) {
            throw new IllegalArgumentException("Incomplete challenge attempt information.");
        }

        String query = "INSERT INTO attempts(participant_username, challenge_id, attempt_date) VALUES(?, ?, NOW())";
        PreparedStatement St = con.prepareStatement(query);
        St.setString(1, info[0].trim());
        St.setInt(2, Integer.parseInt(info[1].trim()));
        St.executeUpdate();
        St.close();
    } 
    //getting participants from the participant tabel
    private static List<Map<String, Object>> retrieveApplicantsFromDatabase(Connection con) throws SQLException {
        List<Map<String, Object>> applicants = new ArrayList<>();
        Statement statement = con.createStatement();
        ResultSet resultSet = statement.executeQuery("SELECT * FROM participants");

        while (resultSet.next()) {
            Map<String, Object> applicant = new HashMap<>();
            applicant.put("username", resultSet.getString("username"));
            applicant.put("firstname", resultSet.getString("firstname"));
            applicant.put("lastname", resultSet.getString("lastname"));
            applicant.put("email", resultSet.getString("email"));
            applicant.put("date_of_birth", resultSet.getString("date_of_birth"));
            applicant.put("school_registration_number", resultSet.getString("school_registration_number"));
            applicant.put("imagefile", resultSet.getString("imagefile"));

            applicants.add(applicant);
        }

        resultSet.close();
        statement.close();

        return applicants;
    }

//method to handle registration
private static boolean registerParticipant(Connection con,String registration)throws SQLException{
String [] info=registration.split(" ");
if (info.length < 7) {
    throw new IllegalArgumentException("Incomplete registration information.");
}
String dateOfBirth = info[4].trim();
if (!dateOfBirth.matches("\\d{4}/\\d{2}/\\d{2}")) {
    throw new IllegalArgumentException("Invalid date format.");
}
dateOfBirth = dateOfBirth.replace('/', '-'); // Converting to SQL date format
String checkQuery = "SELECT * FROM schools WHERE schoolregistrationumber = ?";
PreparedStatement checkSt = con.prepareStatement(checkQuery);
checkSt.setString(1, info[5].trim());
ResultSet rs = checkSt.executeQuery();

if (!rs.next()) {
    return false; // School registration number not found
}
//start registration
String query="INSERT INTO participants(username,firstname,lastname,email,date_of_birth,school_registration_number,imagefile) VALUES(?,?,?,?,?,?,?)";
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
//adding participants with schools in the database;
try (FileWriter writer = new FileWriter("registered_participants.txt", true)) {
            writer.write(registration + "\n");
        } catch (IOException e) {
            e.printStackTrace();
        }

        // Send email notification
        sendEmailNotification(rs.getString("email"), info);
        return false;
    }

    // Method to send email notification to the representative of the school
    private static void sendEmailNotification(String email, String[] participantInfo) {
        String host = "smtp.example.com";
        final String username = "your-email@example.com";
        final String password = "your-password";

        Properties props = new Properties();
        props.put("mail.smtp.auth", "true");
        props.put("mail.smtp.starttls.enable", "true");
        props.put("mail.smtp.host", host);
        props.put("mail.smtp.port", "587");

        // Session session = Session.getInstance(props, new javax.mail.Authenticator() {
        //     protected PasswordAuthentication getPasswordAuthentication() {
        //         return new PasswordAuthentication(username, password);
        //     }
        // });

        // try {
        //     Message message = new MimeMessage(session);
        //     message.setFrom(new InternetAddress("your-email@example.com"));
        //     message.setRecipients(Message.RecipientType.TO, InternetAddress.parse(email));
        //     message.setSubject("New Participant Registration");
        //     message.setText("A new participant has registered:\n\n" +
        //             "Username: " + participantInfo[0] + "\n" +
        //             "First Name: " + participantInfo[1] + "\n" +
        //             "Last Name: " + participantInfo[2] + "\n" +
        //             "Email: " + participantInfo[3] + "\n" +
        //             "Date of Birth: " + participantInfo[4] + "\n" +
        //             "School Registration Number: " + participantInfo[5] + "\n" +
        //             "Image File: " + participantInfo[6] + "\n\n" +
        //             "Please confirm this registration.");

        //     Transport.send(message);
        // } catch (MessagingException e) {
        //     throw new RuntimeException(e);}
}
//retrieving challenges from the database
private static List<Map<String, Object>> retrieveChallengesFromDatabase(Connection con) throws SQLException {
        List<Map<String, Object>> challenges = new ArrayList<>();
        Connection connection = DriverManager.getConnection("jdbc:mysql://localhost:3306/mathematicschallenge", "root", "");

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
        connection.close();

        return challenges;
    }}