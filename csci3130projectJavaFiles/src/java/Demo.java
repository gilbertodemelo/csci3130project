import java.util.Scanner;

public class Demo
{
    public static void main(String[] args) 
    {
	//this is a simple login to test the User class
	User u1 = new User("Richard", "rs123", 0, 1);
	Scanner input = new Scanner(System.in);
	System.out.print("Username: ");
	String user = input.nextLine();
	System.out.print("Password: ");
	String pass = input.nextLine();
	input.close();
	if(user.equals(u1.getUser()))
	{
            if(pass.equals(u1.getPassword()))
            {
                System.out.println("Welcome "+u1.getUser());
		System.out.println(u1.toString());
            }
            else System.out.println("Incorrect password");
	}
	else System.out.println("Incorrect username");	
	Character c1 = new Character(1,1,"Ash",0,"pic");
	System.out.println(c1.toString());
    }
}