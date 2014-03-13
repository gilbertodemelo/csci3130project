
import org.junit.Test;
import static org.junit.Assert.*;

/**
 *
 * @author Richard
 */
public class CharacterTest {
    
    @Test
    public void CharacterTest() {
        Character c = new Character(1, 1, "Pikachu", 10, "null");
        assertEquals(1, c.getAccountID());
        assertEquals(1, c.getCharaId());
        assertEquals("Pikachu", c.getCharaName());
        assertEquals(10, c.getDailyPoint());
        assertEquals("null", c.getPicture());
    }
}
