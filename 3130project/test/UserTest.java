/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

import org.junit.Test;
import static org.junit.Assert.*;

/**
 *
 * @author Richard
 */
public class UserTest {
    
    @Test
    public void UserTest() {
        User u = new User("Richard", "group14", 0, 1);
        assertEquals("Richard", u.getUser());
        assertEquals("group14", u.getPassword());
        assertEquals(0, u.getTotalPoints());
        assertEquals(1, u.getAccountID());
    }
}
