import java.util.ArrayList;

public class User
{
    //attributes
    private String user;
    private String password;
    private int totalPoints; //total points accumulated by the user since registering
    private int accountID;
    private ArrayList<User> friends;
	
    //constructor
    public User(String username, String pass, int tp, int a)
    {
	user = username;
	password = pass;
	totalPoints = tp;
	accountID = a;
        friends = new ArrayList();
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
	
    public ArrayList<User> getFriends() {
	return friends;
    }
	
    public void setFriends(ArrayList<User> friends) {
	this.friends = friends;
    }
        
    //to string method
    @Override
    public String toString()
    {
    	return "Username: "+user+", Password: "+password+", Points: "+totalPoints+", Account ID: "+accountID;
    }
        
    public String addFriend(User f)
    {
        if(friends.size()<5)
        {
            friends.add(f);
            return f+" added successfully";
        }
        else return "Sorry, you have too many friends";
    }
    
    public String removeFriend(User f)
    {
        if(friends.contains(f))
        {
            friends.remove(f);
            return "Friend removed successfully";
        }
        else return "That person is not on your friends list";
    }
    
    public String getFriendInfo(User f)
    {
        if(friends.contains(f))
        {
            return friends.get(friends.indexOf(f)).toString();
        }
        else return "That person is not on your friends list";
    }
}