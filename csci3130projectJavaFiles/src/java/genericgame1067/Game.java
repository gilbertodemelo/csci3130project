package genericgame1067;

import java.util.ArrayList;

public class Game
{
    //attributes
    ArrayList<Character> randomCharacters;
    ArrayList<Character> usedCharacters;
    ArrayList<User> users;
    ArrayList<Building> buildings;
    ArrayList<Event> events;
    //constructor
    public Game()
    {
        randomCharacters = new ArrayList();
        usedCharacters = new ArrayList();
        users = new ArrayList();
    }
    //method to randomly assign characters to users
    public void randomAssign()
    {
        int random;
	for(int i = 0; i < users.size(); i++)
        {
            random = (int)(Math.random()*randomCharacters.size());
            Character c = randomCharacters.get(random);
            usedCharacters.add(c);
            randomCharacters.remove(c);
            //if we run out of characters before users, start reusing them
            if(randomCharacters.isEmpty()){
                randomCharacters = usedCharacters;
		usedCharacters.clear();
            }
	}
    }
    //method to add users to ArrayList
    public void addUser(User u)
    {
	users.add(u);
    }
}