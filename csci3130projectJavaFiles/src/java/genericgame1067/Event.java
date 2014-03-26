package genericgame1067;

public class Event {

    /**
     * attributes
     */
    private Building place;
    private String type; //type of events must be defined and classified
    private Character character1;
    private Character character2;

    /**
     * empty constructor
     */
    public Event() {
    }

    /**
     * constructor with parameters
     */
    public Event(Building place, String type) {
        this.place = place;
        this.type = type;
    }

    /**
     * set methods
     */
    public void setPlace(Building place) {
        this.place = place;
    }

    public void setType(String type) {
        this.type = type;
    }

    /**
     * get methods
     */
    public Building getPlace() {
        return place;
    }

    public String getType() {
        return type;
    }

    /**
     * Method: characterMeet Parameters: place, type, character Return: String
     * describing the location and whom the character met
     */
    public String characterMeet(Building place, String type, Character character2){
        String message;
        this.character2 = character2;
        message = "You have met " + character2.getCharaName() + " at "
                + place.getBuildingName() + "!";
        return message;

        //TO DO: Must be able to detect other characters nearby
    }
} //end of class
