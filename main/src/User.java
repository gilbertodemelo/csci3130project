import java.util.HashMap;

public class User
{
	//attributes
	private String user;
	private String password;
	private int totalPoints; //total points accumulated by the user since registering
	private int accountID;
	private Character assigned;
	private static HashMap<String, String> userPass; //hasmap containing username/password combos
	//constructor
	public User(String username, String pass, int tp, int a)
	{
		user = username;
		password = pass;
		totalPoints = tp;
		accountID = a;
		assigned = null;
		userPass.put(user, password);
	}
	//get and set methods 
	public int getTotalPoints() {
		return totalPoints;
	}

	public void setTotalPoints(int totalPoints) {
		this.totalPoints = totalPoints;
	}

	public int getAccountID() {
		return accountID;
	}

	public void setAccountID(int accountID) {
		this.accountID = accountID;
	}

	public String getUser() {
		return user;
	}

	public void setUser(String user) {
		this.user = user;
	}

	public String getPassword() {
		return password;
	}

	public void setPassword(String password) {
		this.password = password;
	}
	public Character getAssigned() {
		return assigned;
	}
	public void setAssigned(Character assigned) {
		this.assigned = assigned;
	}
	
	
}